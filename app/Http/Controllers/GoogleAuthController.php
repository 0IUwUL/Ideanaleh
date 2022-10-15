<?php

namespace App\Http\Controllers;

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
}
