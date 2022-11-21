<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Import model
use App\Models\User; 

class GoogleAuthController extends Controller
{
    public function googleLoginUser(Request $request) {
        // Decode JWT token from google 
        $userInfo = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $request->credential)[1]))));
        
        $user = User::where('email', '=', $userInfo->email)->first();

        if ($user) {
            return $this->_loginUser($request, $user);
        }
        else {
            // Register when the user is not yet registered when they try to sign in with google
            return $this->registerUser($request, $userInfo);
        }

    }

    private function registerUser($request, $userInfo) {
        
        $user = new User;
        $user->Lname = $userInfo->family_name;
        $user->Fname = $userInfo->given_name;
        $user->email = $userInfo->email;
        
        // Save in database
        $user->save();

        // Auto Login the user when they sign up with google?
        $currentUser = User::where('email', '=', $userInfo->email)->first();
        return $this->_loginUser($request, $currentUser);
        
    }

    /**
     * Second parameter only accepts variable type of Object
     * Explicitly set to prevent errors
     */
    private function _loginUser(Request $request, Object $user) {
        $request->session()->put('loginId', $user->id);

        return (redirect('/'));
    }
}
