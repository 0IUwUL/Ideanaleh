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
        $request->validate([
            'LoginEmail' => 'required|email',
            'LoginPassword' => 'required',
        ]);

        $user = User::where('email', '=', $request->LoginEmail)->first();

        if ($user){
            if (Hash::check($request->LoginPassword, $user->password)) {
                // Saving user id to a session variable called "loginId"
                $request->session()->put('loginId', $user->id);
                
                return (redirect('/'));
            } else {
                return redirect()->back()->with('message', 'Incorrect Password');
            }
        } else {
            return redirect()->back()->with('message', 'Email not found');
        }

    }


    public function logout(){
        if (Session::has('loginId')) {
            Session::pull('loginId');

            return (redirect('/'));
        }
    }
}
