<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class LoginController extends Controller
{
    public function loginUser(Request $request){
        $user = User::where('email', '=', $request->LoginEmail)->first();
        // Saving user id to a session variable called "loginId"
        $request->session()->put('loginId', $user->id);
        return (redirect('/'));
    }

    public function verifyInput (Request $request){
        $user = User::where('email', '=', $request->email)->first();
        if ($user){
            if (Hash::check($request->pass, $user->password)) {
                $json_data = array("response" => "success");
            } else {
                $json_data = array("response" => "err_pass");
            }
        } else {
            $json_data = array("response" => "err_mail");
        }
        echo json_encode($json_data);
    }


    public function logout(){
        if (Session::has('loginId')) {
            Session::pull('loginId');

            return (redirect('/'));
        }
    }
}
