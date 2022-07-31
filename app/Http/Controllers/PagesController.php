<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctors;
use App\Models\Users;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;
use Auth;
use Exception;
use Socialite;
use Validator;


class PagesController extends Controller
{
    public function home()
    {
        return view('home');
    }
    //----------------------------Login----------------------------//
    public function login(){
        return view('pages.login');
    }
    public function loginSubmit(Request $request){
        $validate = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],
        [
            'email.required' => 'Please enter your email',
            'password.required' => 'Please enter your password',
        ]);

        $userName = $request->input('email');
        $password = $request->input('password');

        $user = Users::where('email', $request->email)
            ->where('password', md5($request->password))
            ->first();
        if($user){
            if($user->verified == "true"){
                if($user && $user->role == "admin"){
                    $request->session()->put('user', $user->name);
                    session()->put('role', $user->role);
                    session()->put('id', $user->userID);
                    return redirect()->route('chart');
                }
                elseif($user && $user->role == "doctor"){
                    $request->session()->put('user', $user->name);
                    $request->session()->put('ID', $user->userID);
                    session()->put('role', $user->role);
                    return redirect()->route('homeDoctor');
                }
                elseif($user && $user->role == "patient"){
                    $request->session()->put('user', $user->name);
                    session()->put('role', $user->role);
                    return redirect()->route('homePatient');
                }
                elseif($user && $user->role == "pharmacist"){
                    $request->session()->put('user', $user->name);
                    session()->put('role', $user->role);
                    return redirect()->route('homePharmacist');
                }
            }
            else{
                return redirect()->route('login')->with('error', 'Your account is not verified.');
            }
        }
        else{
            return redirect()->route('login')->with('error1', 'Invalid email or password');
        }
    }
    
    

    //.........................Registration.........................//
    public function registration(){
        return view('pages.registration');
    }

    public function registrationSubmit(Request $request){
        $validate = $request->validate([
            'name' => 'required| min:3',
            'email' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6|same:password',
            'dob' => 'required',
            'gender' => 'required',
            'role' => 'required'
        ],
        ['name.required'=>"Please put you name here",
        'name.min'=>"Name must be at least 3 characters long"],
    );
        $user = new Users();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phoneNumber = $request->phone;
        $user->password = md5($request->password);
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->role = $request->role;
        $user->verified = $request->verified;
        $user->save();
        
        return view('pages.login');
    }

    public function logout(){
        session()->flush();
        return view('pages.login');
    }
}