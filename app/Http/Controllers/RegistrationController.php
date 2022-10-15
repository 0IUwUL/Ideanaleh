<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Import model
use App\Models\User; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegistrationController extends Controller
{
    public function registerUser(Request $request){


        $validator = Validator::make($request->all(), [
            'email' => 'unique:users',
        ]);
 
        if ($validator->fails()) {
            return redirect()->back()->with('message', 'Email is already registered');
        }else{
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
        
        return redirect('/');
        }
    }
}
