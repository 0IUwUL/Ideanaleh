<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Import model
use App\Models\User; 

class GoogleAuthController extends Controller
{

    public function googleCallback(Request $request) {
        
        // Decode JWT token from google 
        $userInfo = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $request->credential)[1]))));

        $user = new User;
        $user->Lname = $userInfo->family_name;
        $user->Fname = $userInfo->given_name;
        $user->email = $userInfo->email;
        
        // Save in database
        $user->save();

        return redirect('/');
        
    }


    public function googleLoginUser(Request $request) {
        // Decode JWT token from google 
        $userInfo = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $request->credential)[1]))));

        // dd($userInfo);

        $user = User::where('email', '=', $userInfo->email)->first();

        if ($user) {
            $request->session()->put('loginId', $user->id);

            return (redirect('/'));
        }
    }
}
