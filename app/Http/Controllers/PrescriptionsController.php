<?php

namespace App\Http\Controllers;

use App\Models\Prescriptions;
use App\Models\PharmaceuticalItems;
use App\Models\Users;
use App\Http\Requests\StorePrescriptionsRequest;
use App\Http\Requests\UpdatePrescriptionsRequest;
use Illuminate\Http\Request;
use Session;
use DB;
use Symfony\Component\Console\Output\ConsoleOutput;


class PrescriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePrescriptionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrescriptionsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prescriptions  $prescriptions
     * @return \Illuminate\Http\Response
     */
    public function show(Prescriptions $prescriptions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prescriptions  $prescriptions
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescriptions $prescriptions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePrescriptionsRequest  $request
     * @param  \App\Models\Prescriptions  $prescriptions
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrescriptionsRequest $request, Prescriptions $prescriptions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prescriptions  $prescriptions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescriptions $prescriptions)
    {
        //
    }

    public function prescriptions(Request $request)
    {
        if ($request->isMethod('get')) {
            $appointments = DB::table('appointments')->leftJoin('users', 'appointments.userID', '=', 'users.userID')->where('appointments.doctorID', '=', Session::get('ID'))->where('appointments.hasPaid', '=', 'true');
            $app = $appointments->select([
                'users.name',
                'users.userID',
                'appointments.appID',
            ])->get();
            return view('doctors.prescriptions')->with('appointments', $app);
        }
        if ($request->isMethod('post')) {
            $validate = $request->validate([
                'patientID' => 'required',
            ],
            [
                'patientID.required' => 'Please select a patient',
            ]);
            $str_arr = explode ("/", $request->patientID); 
            $checkprecription = DB::table('prescriptions')->where('appID', '=', $str_arr[0])->get();
            if (count($checkprecription) > 0) {
                $request->session()->put('appID', $str_arr[0]);
                return redirect()->route('prescription');
            }
            $prescriptions = new Prescriptions();
            $prescriptions->appID =  $str_arr[0];
            $prescriptions->userID =  $str_arr[1];
            $prescriptions->doctorID = Session::get('ID');
            $prescriptions->save();
            $request->session()->put('appID', $str_arr[0]);
            return redirect()->route('prescription');
        }
    }
    public function prescription(Request $request)
    {
        if ($request->isMethod('get')) {
            $pharmaceuticalItems = DB::table('pharmaceutical_items')->get();
            $prescription = DB::table('prescriptions')->where('appID', '=', Session::get('appID'))->get();

            return view('doctors.prescription')->with('pharmaceuticalItems', $pharmaceuticalItems)->with('prescription', $prescription);
        }
        if ($request->isMethod('post')) {
            $validate = $request->validate([
                'pharmaceuticalItemsName' => 'required',
                'advice' => 'required',
            ],
            [
                'pharmaceuticalItemsName.required' => 'Please select a pharmaceutical item Name',
                'advice.required' => 'Please enter advice',
            ]);
            $prescription = DB::table('prescriptions')->where('prescriptions.doctorID', '=', Session::get('ID'))->where('prescriptions.appID', '=', Session::get('appID'));
            $prescriptionItems = $prescription->select([
                'pharmaceuticalItemsName',
            ])->get();
            if(empty($prescriptionItems)) {
                $prescription->update([
                    'pharmaceuticalItemsName' => $request->pharmaceuticalItemsName,
                    'advice' => $request->advice,
                ]);
            }
            else {
                $store1 = '';
                foreach ($prescriptionItems as $prescriptionItem){
                    $store1 =  $prescriptionItem->pharmaceuticalItemsName;
                }
                if($store1 == ''){
                    $prescription->update([
                        'pharmaceuticalItemsName' => $request->pharmaceuticalItemsName,
                        'advice' => $request->advice,
                    ]);
                }
                else {
                    $store2 = explode(",", $store1);
                    foreach ($store2 as $store3){
                        if($store3 == $request->pharmaceuticalItemsName){
                            $request->session()->flash('error', 'Pharmaceutical Item already added');
                            return redirect()->route('prescription');
                        }
                    }
                    $prescription->update([
                        'pharmaceuticalItemsName' => $store1 . "," . $request->pharmaceuticalItemsName,
                        'advice' => $request->advice,
                    ]);
                }
            }
            return redirect()->route('prescription');
        }
    }

    public function downloadPrescription()
    {
        $prescription = DB::table('prescriptions')->leftJoin('users', 'prescriptions.userID', '=', 'users.userID')->where('prescriptions.doctorID', '=', Session::get('ID'))->where('prescriptions.appID', '=', Session::get('appID'));
        $pres = $prescription->select([
            'users.name',
            'users.userID',
            'users.gender',
            'prescriptions.prescriptionID',
            'prescriptions.appID',
            'prescriptions.doctorID',
            'prescriptions.pharmaceuticalItemsName',
            'prescriptions.advice',
        ])->get();
        $medicinelists = $prescription->select([
            'prescriptions.pharmaceuticalItemsName',
        ])->get();
        $store5 = '';
        foreach ($medicinelists as $medicinelist){
            $store5 =  $medicinelist->pharmaceuticalItemsName;
        }
        $store6 = explode(",", $store5);
        $doctor = DB::table('users')->where('userID', '=', Session::get('ID'));
        $doctorName = $doctor->select([
            'name',
        ])->get();
        return view('doctors.downloadPrescription')->with('prescription', $pres)->with('doctorName', $doctorName)->with('medicinelists', $store6);
    }

    public function prescriptionsList(Request $request)
    {
        if ($request->isMethod('get')) {
            if(Session::has('search')){
                $posts = DB::table('prescriptions')->where('prescriptionID', 'like', '%' . Session::get('search') . '%')
                ->orWhere('appID', 'like', '%' . Session::get('search') . '%')
                ->orWhere('userID', 'like', '%' . Session::get('search') . '%')->paginate(3);
                session()->forget('search');
                return view('doctors.prescriptionsList')->with('prescriptions', $posts);
            }
            else{
                $prescriptions = Prescriptions::where('doctorID', Session::get('ID'))->paginate(3);
                return view('doctors.prescriptionsList')->with('prescriptions', $prescriptions);
            }
        }
        if ($request->isMethod('post')) {
            $search = $request->search;
            $request->session()->put('search', "$request->search");
            return redirect()->route('prescriptionsList');
        }
    }
}
