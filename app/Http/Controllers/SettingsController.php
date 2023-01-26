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
    private $user;

    public function __construct()
    {
        // Get user info from session
        $this->middleware(function ($request, $next) {
            $this->user= Auth::user();
    
            return $next($request);
        });
    }

    public function index(Request $request): Object
    {
        return view('pages.settings')->with('user', $this->user->toArray());
    }
    
    public function changePass(Request $request): Object
    {
        $user = User::find($this->user->id);
        $user->password = $request->password;
        $user->save();

        return redirect('settings');
    }

    public function changeName(Request $request): Object
    {

        $user = array(
            'Lname' => $request->inputLname,
            'Fname' => $request->inputFname,
            'Mname' => $request->inputMname,
        );
        
        User::where('id', $this->user->id)->update($user);
      
        return redirect('settings');
    }

    public function uploadImage(Request $request): Object
    {
        (new RegistrationController)->saveAvatarPath(Auth::id(), $request);
       
        return redirect('settings');
    }
    
    public function checkPassword(Request $request): void
    {
        // Get password from DB since it is not store in session
        $user = User::find($this->user->id);

        if (Hash::check($request->password, $user->password)) {
            $json_data = array("response" => "success");
        }
        else {
            $json_data = array("response" => "fail");
        }
        
        echo json_encode($json_data);
   
    }

    public function changeAddress(Request $request): Object
    {
        User::where('id', $this->user->id)->update(['address'=> $request->inputAddress]);
      
        return redirect('settings');
    }

    public function changeEmail(Request $request): Object
    {
        $user = array(
            'email' => $request->inputEmail,
            'dev_mode' => 0
        );
        
        User::where('id', $this->user->id)->update($user);
      
        return redirect('settings');
    }


}
