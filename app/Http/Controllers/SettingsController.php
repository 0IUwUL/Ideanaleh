<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;

use App\Http\Controllers\Auth\RegistrationController;

//Import model
use App\Models\User; 

class SettingsController extends Controller
{
    public function index(Request $request): Object
    {
        // Get user info from session
        $user = Auth::user()->toArray();
        
        return view('pages.settings')->with('user', $user);
    }
    
    public function changePass(Request $request): Object
    {
        // Get user id
        $userId = Auth::id();
       
        User::where('id', $userId)->update(['password' => bcrypt($request->newPass)]);

        return redirect('settings');
    }

    public function changeName(Request $request): Object
    {
        // Get user id
        $userId = Auth::id();

        $user = array(
            'Lname' => $request->inputLname,
            'Fname' => $request->inputFname,
            'Mname' => $request->inputMname,
        );
        
        User::where('id', $userId)->update($user);
      
        return redirect('settings');
    }

    public function uploadImage(Request $request): Object
    {
        (new RegistrationController)->saveAvatarPath(Auth::id(), $request);
       
        return redirect('settings');
    }
    
    public function checkPassword(Request $request): void
    {
        // Get user id and search to db
        $userId = Auth::id();
        $user = User::find($userId);

        if (Hash::check($request->pass, $user->password)) {
            $json_data = array("response" => "success");
        }
        else {
            $json_data = array("response" => "fail");
        }
        
        echo json_encode($json_data);
   
    }

    public function changeAddress(Request $request): Object
    {
        // Get user id
        $userId = Auth::id();

        $user = array(
            'address' => $request->inputAddress,
        );
        
        User::where('id', $userId)->update($user);
      
        return redirect('settings');
    }

    public function changeEmail(Request $request): Object
    {
        // Get user id
        $userId = Auth::id();

        $user = array(
            'email' => $request->inputEmail,
            'dev_mode' => 0
        );
        
        User::where('id', $userId)->update($user);
      
        return redirect('settings');
    }


}
