<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Token;
use App\Models\Doctors;
use App\Models\Prescriptions;
use App\Models\PharmaceuticalItems;
use App\Http\Controllers\localStorage;
use Illuminate\Support\Str;
use Session;
use DB;


class DoctorsAPIController extends Controller
{
    //
    public function homeDoctor(Request $req){
        // $doctor_reviews1 = DB::table('doctor_reviews')->select('point', DB::raw('COUNT(point) as counter'))->where('doctorID' ,'=', Session::get('ID'))->where('point' ,'=', '1')->groupBy('point')->get();
        // $doctor_reviews2 = DB::table('doctor_reviews')->select('point', DB::raw('COUNT(point) as counter'))->where('doctorID' ,'=', Session::get('ID'))->where('point' ,'=', '2')->groupBy('point')->get();
        // $doctor_reviews3 = DB::table('doctor_reviews')->select('point', DB::raw('COUNT(point) as counter'))->where('doctorID' ,'=', Session::get('ID'))->where('point' ,'=', '3')->groupBy('point')->get();
        // $doctor_reviews4 = DB::table('doctor_reviews')->select('point', DB::raw('COUNT(point) as counter'))->where('doctorID' ,'=', Session::get('ID'))->where('point' ,'=', '4')->groupBy('point')->get();
        // $doctor_reviews5 = DB::table('doctor_reviews')->select('point', DB::raw('COUNT(point) as counter'))->where('doctorID' ,'=', Session::get('ID'))->where('point' ,'=', '5')->groupBy('point')->get();

        $doctor = Token::where('token', $req->token)->first();
        if($doctor){
            $doc = Users::where('userID', $doctor->userID)->first();
            return $doc;
        }
    }

    public function doctorProfile(Request $req){
        $doctor = Token::where('token', $req->token)->first();
        if($doctor){
            $doc = Users::where('userID', $doctor->userID)->first();
            return $doc;
        }
    }

    public function doctorFee(Request $req){
        //insert fee indoctor table
        $doctor = new Doctors();
        $doctor->userID = $req->userID;
        $doctor->fee = $req->fee;
        $doctor->save();
    }
    public function prescriptionsList(Request $req){
        //get prescriptions list from prescriptions table
        return Prescriptions::all();
        
    }
}
