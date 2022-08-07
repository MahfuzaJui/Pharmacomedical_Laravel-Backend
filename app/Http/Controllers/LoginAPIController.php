<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Otp;
use App\Models\Token;
use Illuminate\Support\Str;
use DateTime;

use App\Mail\MyMail;
use Illuminate\Support\Facades\Mail;

class LoginAPIController extends Controller
{
    //
    public function login(Request $req){
        $user = Users::where('email', $req->email)->where('password', md5($req->password))->first();
        if($user){
            $api_token = Str::random(64);
            $token = new Token();
            $token->userID = $user->userID;
            $token->token = $api_token;
            $token->created_at = new DateTime();
            if($user->role == "admin"){
                $token->role = "admin";
            }
        
            $token->save();
            return $token;
        }
    }

    public function registration(Request $request){
        $otp = random_int(1000, 9000);
        $data = new Otp();
        $data->otp = $otp;
        $data->email = $request->email;
        $data->created_at = new DateTime();
        $data->expired_at = false;

        $data->save();

        $emailAddress = $request->email;
        $details = [
            'title' => 'Email Verification',
            'OTP' => $otp,
        ];

        Mail::to($emailAddress)->send(new MyMail($details));
        
        
        
    
        $user = new Users();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phoneNumber = $request->phoneNumber;
        $user->password = md5($request->password);
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->role = $request->role;
        $user->verified = $request->verified;
        $user->role = "admin";

        $user->save();

        $api_token = Str::random(64);
        $token = new Token();
        $token->userID = $user->userID;
        $token->token = $api_token;
        $token->role = $user->role;
        $token->created_at = new DateTime();
        $token->save();
        return $token;
    }
    public function verify(Request $request){
        $otp = $request->otp;
        $data = Otp::where('otp', $otp)->where('expired_at', false)->first();
        if($data){
            Users::where('email', $data->email)->update(['verified' => 'verified']);
            Otp::where('otp', $data->otp)->update(['expired_at' => true]);
            return $data;
        }
        return "Otp Invalid";
    }
    public function logout(Request $request){
        $req = $request->delete_token;
        $token = Token::where('expired_at', null)->first();
        if($req == "delete" && $token){
            Token::where('expired_at', null)->update(['expired_at'=>new DateTime()]);
            return "token_expired";
        }
        return "Not Expired";
    }
}
