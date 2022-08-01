<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Token;
use Illuminate\Support\Str;
use DateTime;
class LoginAPIController extends Controller
{
    //
    public function  login(Request $req){
        

        $user = Users::where('email',$req->email)->where('password', md5($req->password))->first();
        if($user){
            
            
            $api_token = Str::random(64);
    
            $token = new Token();
            $token->email = $user->email;
            $token->token = $api_token;
            $token->created_at = new DateTime();
            $token->save();
            return $token;
        }
    
        return "No user found";
    


    }


} 