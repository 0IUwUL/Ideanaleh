<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;

//Import model
use App\Models\User; 

class SettingsController extends Controller
{
    public function index(Request $request){
        // Get user id and then query to db
        $userId = $request->session()->get('loginId');
        $query = User::find($userId);

        //dd($user->Fname);
  
        return view('pages.settings')->with('user', $query);
    }
    
    public function changePass(Request $request){
        // Get user id
        $userId = $request->session()->get('loginId');
       
        User::where('id', $userId)->update(['password' => bcrypt($request->newPass)]);

        return redirect('settings');
    }

    public function changeProfile(Request $request){
        // Get user id
        $userId = $request->session()->get('loginId');

        $user = array(
            'Lname' => $request->Lname,
            'Fname' => $request->Fname,
            'Mname' => $request->Mname,
            'address' => $request->address,
        );
        
        User::where('id', $userId)->update($user);
      
        return redirect('settings');
    }
}
