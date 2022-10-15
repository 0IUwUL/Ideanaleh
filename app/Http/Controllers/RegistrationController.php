<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; //Import model
class RegistrationController extends Controller
{
    public function saveItem(Request $request){

        //dd(json_encode($request->all()));

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
