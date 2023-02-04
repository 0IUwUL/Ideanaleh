<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;
use Auth;

class LoginController extends Controller
{
    public function loginUser(Request $request): Object
    {
        $user = User::where('email', '=', $request->LoginEmail)->first();
        // Saving user to a session
        Auth::loginUsingId($user->id);
        // dd($user->toArray());
        // set session if admin
        $request->session()->put('admin', $user->admin);
        $request->session()->put('mode', $user->dev_mode);
        return (redirect('/'));
    }

    public function verifyInput (Request $request): string
    {
        $user = User::where('email', '=', $request->email)->first();

        if (empty($user))  return json_encode(["response" => "err_mail"]); 

        if (!Hash::check($request->pass, $user->password)) return json_encode(["response" => "err_pass"]);

        if(!$user->active) return json_encode(["response" => "err_acc"]);

        return json_encode(["response" => "success"]);
    }


    public function logout(): object
    {
        if (Auth::check()) {
            Auth::logout();

            return (redirect('/'));
        }
    }
}
