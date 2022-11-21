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

    public function changeName(Request $request){
        // Get user id
        $userId = $request->session()->get('loginId');

        $user = array(
            'Lname' => $request->inputLname,
            'Fname' => $request->inputFname,
            'Mname' => $request->inputMname,
        );
        
        User::where('id', $userId)->update($user);
      
        return redirect('settings');
    }

    public function uploadImage(Request $request){
        // Get user id
        $userId = $request->session()->get('loginId');
        
        if($request->hasFile('avatar')){
            // Store the icon to avatars folder under public folder
            $iconPath = $request->file('avatar')->storeAs(
                'avatars',
                // Set the name to id.imgExtension (e.g 1.jpg)
                $userId.'.'.$request->file('avatar')->getClientOriginalExtension(),
                'public',
            );

            User::where('id', $userId)->update(['icon' => $iconPath]);
        }
       
        return redirect('settings');
    }
    
    public function checkPassword(Request $request){
        // Get user id and search to db
        $userId = $request->session()->get('loginId');
        $user = User::find($userId);

        if (Hash::check($request->pass, $user->password)) {
            $json_data = array("response" => "success");
        }
        else {
            $json_data = array("response" => "fail");
        }
        
        echo json_encode($json_data);
   
    }

    public function changeAddress(Request $request){
        // Get user id
        $userId = $request->session()->get('loginId');

        $user = array(
            'address' => $request->inputAddress,
        );
        
        User::where('id', $userId)->update($user);
      
        return redirect('settings');
    }

    public function changeEmail(Request $request){
        // Get user id
        $userId = $request->session()->get('loginId');

        $user = array(
            'email' => $request->inputEmail,
            'dev_mode' => 0
        );
        
        User::where('id', $userId)->update($user);
      
        return redirect('settings');
    }


}
