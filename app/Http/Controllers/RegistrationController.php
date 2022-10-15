<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Import model
use App\Models\User; 
class RegistrationController extends Controller
{
    public function register(Request $request){

        //dd(json_encode($request->all()));

        $user = new User;
        $user->Lname = $request->Lname;
        $user->Fname = $request->Fname;
        $user->Mname = $request->Mname;
        $user->address = $request->Lname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->icon = $request->icon;
        $user->pref_categs = implode(',', $request->Categs);
        
        $user->save();

        return view('welcome');
    }
}
