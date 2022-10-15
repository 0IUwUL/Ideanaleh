<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Import model
use App\Models\User; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegistrationController extends Controller
{
    public function register(Request $request){

        //dd(json_encode($request->all()));
        $validator = Validator::make($request->all(), [
            'email' => 'unique:users',
        ]);
 
        if ($validator->fails()) {
            return redirect()->back()->with('message', 'Email is already registered');
        }else{
        $newListItem = new User;
        $newListItem->Lname = $request->Lname;
        $newListItem->Fname = $request->Fname;
        $newListItem->Mname = $request->Mname;
        $newListItem->address = $request->Lname;
        $newListItem->email = $request->email;
        $newListItem->password = bcrypt($request->password);
        $newListItem->icon = $request->icon;
        $newListItem->pref_categs = implode(',', $request->Categs);
        
        $newListItem->save();
        
        return view('welcome');
        }
    }
}
