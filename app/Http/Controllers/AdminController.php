<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Appointment;
use App\Models\Pharmaceutical_item;
use App\Models\Doctor_review;
use App\Models\Doctor;
use \PDF;


use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;


class AdminController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
    public function homeAdmin(){
        return view('admin.homeAdmin');
    }
    public function admindash(){
        return view('admin.admindash');
    }
    public function profileEdit(Request $request){
        $user_id = session()->get('id');
        $user = Users::where('userID', '1')->first();
    //     $validate = $request->validate([
    //         'name' => 'required| min:3',
    //         'email' => 'required',
    //         'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
    //         'password' => 'required|min:6|confirmed',
    //         'password_confirmation' => 'required|min:6|same:password',
    //         'dob' => 'required',
    //         'gender' => 'required',
    //         'role' => 'required'
    //     ],
    //     ['name.required'=>"Please put you name here",
    //     'name.min'=>"Name must be at least 3 characters long"],
    // );
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phoneNumber = $request->phoneNumber;
        $user->password = md5($request->password);
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->role = $request->role;
        $user->save();

        // return redirect()->route('profileAdmin');
        return $user;
    }
    public function logout(){
        session()->forget('user');
        return view('Pages.login');
    }
//.................Admin...............//
public function profileAdmin(Request $request){
    $user_id = session()->get('id');
    $user = Users::where('userID', '1')->first();
    // return view('admin.profileAdmin')->with('user', $user);
    return $user;
}
public function list(){
    $users = Users::where('userID','!=',"0")->get();// ekhane sob uuser show korao
    // return view('admin.list')->with('user', $users);
    return  $users;
}
public function searchUser(Request $request){
    $query = $request->input('searched_users');
    $searched_users = Users::where('name', 'like', "%$query%")->orwhere('email', 'like', "%$query%")->orwhere('phoneNumber', 'like', "%$query%")->orwhere('role', 'like', "%$query%")->get();
    
    return view('admin.searchUser')->with('user', $searched_users);
}
public function editUser(Request $request){
    $user = Users::where('userID', $request->userID)->first();
    // return view('admin.editUser')->with('user', $user);
    return $user;
}
public function editUserSubmit(Request $request){
    $user = Users::where('userID', $request->userID)->first();
//     $validate = $request->validate([
//         'name' => 'required| min:3',
//         'email' => 'required',
//         'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
//         'password' => 'required|min:6|confirmed',
//         'password_confirmation' => 'required|min:6|same:password',
//         'dob' => 'required',
//         'gender' => 'required',
//         'role' => 'required'
//     ],
//     ['name.required'=>"Please put you name here",
//     'name.min'=>"Name must be at least 3 characters long"],
// );
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phoneNumber = $request->phoneNumber;
    $user->password = $request->password;
    $user->dob = $request->dob;
    $user->gender = $request->gender;
    $user->save();

    return $user;
}
public function deleteUser(Request $request){
    $user = Users::where('userID', $request->userID)->first();
    // return view('admin.deleteUser')->with('user', $user);
    return $user;
}
public function deleteUserSubmit(Request $request){
    $user = Users::where('userID', $request->userID)->first();
    $user->delete();
    // return redirect()->route('listAdmin');
    return $user;
}
public function addUser(){
    return view('admin.addUser');
}
public function addUserSubmit(Request $request){
//     $validate = $request->validate([
//         'name' => 'required| min:3',
//         'email' => 'required',
//         'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
//         'password' => 'required|min:6|confirmed',
//         'password_confirmation' => 'required|min:6|same:password',
//         'dob' => 'required',
//         'gender' => 'required',
//         'role' => 'required'
//     ],
//     ['name.required'=>"Please put you name here",
//     'name.min'=>"Name must be at least 3 characters long"],
// );
    $user = new Users();

    $user->name = $request->name;
    $user->email = $request->email;
    $user->phoneNumber = $request->phoneNumber;
    $user->password = md5($request->password);
    $user->dob = $request->dob;
    $user->gender = $request->gender;
    $user->role = $request->role;
    $user->save();

    // return redirect()->route('listAdmin');
    return $user;
}
public function applist(){
    $apps = Appointment::where('appointmentStatus',"true")->get();
    // return view('admin.applist')->with('appointments', $apps);
    return $apps;
}
public function searchApp(Request $request){
    $query = $request->input('searched_apps');
    $searched_apps = Appointment::where('purpose', 'like', "%$query%")->get();
    
    return view('admin.searchApp')->with('appointments', $searched_apps);
}

public function appDoctor(){

    //$doctor = Doctor::find(1);
    $doctor = Doctor::where('doctorID','=','1')->get();
    $docf = Doctor::find(1);
    $app = $docf->appointments;
   
    return view('admin.appDoctor')->with('app',$app)->with('doctor',$doctor);
 
}

public function addapp(){
    $patient = Users::select('userID')->get();
    $doctor = Doctor::select('doctorID')->get();
    return view('admin.addapp')->with('patients', $patient)->with('doctors', $doctor);
}
public function addappSubmit(Request $request){

    // return $request->input();
//     $validate = $request->validate([
//         'AppointmentTime' => 'required',
//         'PatientID' => 'required',
//         'DoctorID' => 'required',
//         'Purpose' => 'required',
//         'Visited' => 'required',
//         'PaymentStatus' => 'required',
//         'PaymentDateTime' => 'required',
//         'AppointmntStatus' => 'required',
//         'Link' => 'required'
        
//     ],
    
// );
    $app = new Appointment();

    $app->appointmentDateTime = $request->appointmentDateTime;
    $app->userID = $request->userID;//PatientID;
    $app->doctorID = $request->doctorID;//DoctorID;
    $app->purpose = $request->purpose;//Purpose;
    $app->visited = $request->visited;//Visited;
    $app->hasPaid = $request->hasPaid;//PaymentStatus;
    $app->paidDateTime = $request->paidDateTime;//PaymentDateTime;
    $app->appointmentStatus = $request->appointmentStatus;//AppointmntStatus;
    $app->link = $request->link;//Link;
    $app->save();
    
    // return redirect()->route('applist');
    return $app;
}
public function patients()
{
    $patient = Users::select('userID')->get();
    
    return view('admin.addapp')->with('patients', $patient);
}
public function doctors()
{
    $doctor = Doctor::select('doctorID')->get();
    
    return view('admin.addapp')->with('doctors', $doctor);
}
public function editapp(Request $request){
    $app = Appointment::where('appID', $request->appID)->first();
    // return view('admin.editapp')->with('appointments', $app);
    return $app;
}
public function editappSubmit(Request $request){
    $app = Appointment::where('appID',$request->appID)->first();
    
    $app->appointmentDateTime = $request->appointmentDateTime;
    $app->userID = $request->userID;//PatientID;
    $app->doctorID = $request->doctorID;//DoctorID;
    $app->purpose = $request->purpose;//Purpose;
    $app->visited = $request->visited;//Visited;
    $app->hasPaid = $request->hasPaid;//PaymentStatus;
    $app->paidDateTime = $request->paidDateTime;//PaymentDateTime;
    $app->appointmentStatus = $request->appointmentStatus;//AppointmntStatus;
    $app->link = $request->link;//Link;
    $app->save();
    //return redirect()->route('applist');
    
    // return $request->input();
    return $app;
}
public function deleteapp(Request $request){
    $app = Appointment::where('appID', $request->appID)->first();
    // return view('admin.deleteapp')->with('appointments', $app);
    return $app;
}
public function deleteappSubmit(Request $request){
    $app = Appointment::where('appID', $request->appID)->first();
    $app->delete();
    // return redirect()->route('applist');
    return $app;
}
public function Itemlist(){
    $items = Pharmaceutical_item::all();
    // $items = Pharmaceutical_item::paginate(3);
    // return view('admin.Itemlist')->with('pharmaceutical_items', $items);
    return $items;
}
public function searchProduct(Request $request){
    $query = $request->input('searched_products');
    $searched_products = Pharmaceutical_item::where('itemName', 'like', "%$query%")->orwhere('price', 'like', "%$query%")->get();
    
    return view('admin.searchProduct')->with('pharmaceutical_items', $searched_products);
}
public function docreviews(){
    $reviews = Doctor_review::all();
    // return view('admin.docreviews')->with('doctor_reviews', $reviews);
    return $reviews;
}

public function deletereviewSubmit(Request $request){
    $review = Doctor_review::where('doctorReviewID', $request->doctorReviewID)->first();
    $review->delete();
    // return redirect()->route('docreviews');
    return $review;
}


public function unverified(){
    $unverifieds = Users::where('verified',"false")->WHERE('role','!=',"Banned")->get();
    // return view('admin.unverified')->with('users', $unverifieds);
    return $unverifieds;
}

public function decline(Request $request){
    
        $user = Users::where('userID', $request->userID)->first();
        $user->delete();
        // return redirect()->route('unverified');
        return $user;
    }
public function accept(Request $request){
    $user = Users::where('userID', $request->userID)->first();
    // return view('admin.accept')->with('users', $user);
    return $user;
    
}
public function acceptSubmit(Request $request){
    $user = Users::where('userID', $request->userID)->first();

    $user->verified = $request->verified;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phoneNumber = $request->phoneNumber;
    $user->password = md5($request->password);
    $user->dob = $request->dob;
    $user->gender = $request->gender;
    $user->role = $request->role;
    $user->save();

    // return redirect()->route('listAdmin');
    return $user;
}
public function ban(Request $request){
    $user = Users::where('userID', $request->userID)->first();
    // return view('admin.ban')->with('users', $user);
    return $user;
    
}
public function banSubmit(Request $request){
    $user = Users::where('userID', $request->userID)->first();

    $user->verified = $request->verified;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phoneNumber = $request->phoneNumber;
    $user->password = md5($request->password);
    $user->dob = $request->dob;
    $user->gender = $request->gender;
    $user->role = $request->role;
    $user->save();

    // return redirect()->route('listAdmin');
    return $user;
}
public function unban(Request $request){
    $user = Users::where('userID', $request->userID)->first();
    // return view('admin.unban')->with('users', $user);
    return $user;
}
public function unbanSubmit(Request $request){
    $user = Users::where('userID', $request->userID)->first();

    $user->verified = $request->verified;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phoneNumber = $request->phoneNumber;
    $user->password = md5($request->password);
    $user->dob = $request->dob;
    $user->gender = $request->gender;
    $user->role = $request->role;
    $user->save();
    // return redirect()->route('listAdmin');
    return $user;
}

public function join()
{
    

    $app =  DB::table('appointments')
  
    ->Join('doctors', 'doctors.doctorID','=','appointments.doctorID')
    ->Join('users', 'users.userID','=','doctors.userID')
    
    ->select('appointments.appID','doctors.doctorID','users.name', 'appointments.userID','appointments.appointmentDateTime','appointments.purpose','appointments.link')->get();

    // return view('admin.join')->with('app',$app);
    return $app;
}
public function chart()
{
    $result=DB::select(DB::raw("SELECT COUNT(*) as items, itemName FROM pharmaceutical_items GROUP BY itemName"));
    $chartData="";
    foreach($result as $list)
    {
        $chartData.="['".$list->itemName."',   ".$list->items."],";
    }
    $arr['chartData']=rtrim($chartData,",");
    
    // return view('admin.chart',$arr);
    return $arr;
}
public function downloadPdf()
{
    $app =  DB::table('appointments')
    //->Join('users', 'users.userID','=','appointments.doctorID')
    ->Join('doctors', 'doctors.doctorID','=','appointments.doctorID')
    ->Join('users', 'users.userID','=','doctors.userID')
    
    ->select('appointments.appID','doctors.doctorID','users.name', 'appointments.userID','appointments.appointmentDateTime','appointments.purpose','appointments.link')->get();

    return view('admin.downloadPdf')->with('app',$app);
}
}