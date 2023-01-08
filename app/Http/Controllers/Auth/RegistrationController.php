<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserPreferenceController;
use Illuminate\Http\Request;

//Import model
use App\Models\User; 

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Auth;

class RegistrationController extends Controller
{
    public function registerUser(Request $request): Object
    {
        $user = new User;
        $user->Lname = $request->Lname;
        $user->Fname = $request->Fname;
        $user->Mname = $request->Mname;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->icon = $request->icon;

        $followed = implode(',', $request->Followed);
        
        $user->save();
        $data = array(
            'id' => $user->id,
            'pref_projs' => $followed,
        );
        //Calling a function of a controller from a controller
        (new UserPreferenceController)->createInitialUserPreference($data);

        Auth::loginUsingId($user->id);
        return redirect('/');
    }

    public function GoogleRegisterUser(Request $request): Object
    {
        
        $userId = Auth::id();
        $followed = implode(',', $request->Followed);
        $data = array(
            'id' => $userId,
            'pref_projs' => $followed,
        );
        //Calling a function of a controller from a controller
        (new UserPreferenceController)->googleUpdatepreferences($data);
        $userStat = User::where('id', '=', $userId)
                                ->select(array('dev_mode'))
                                ->first()
                                ->toArray();
        $request->session()->put('mode', $userStat['dev_mode']);
        return redirect('/');
    }

    public function dupliEmail(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();
        if ($user){
            $json_data = array("response" => "duplicate");
        } else {
            $json_data = array("response" => "success");
        }
        echo json_encode($json_data);
    }
}
