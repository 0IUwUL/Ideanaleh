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
        $user = User::create($request->all());

        $followed = implode(',', $request->Followed);
        $data = array(
            'id' => $user->id,
            'pref_projs' => $followed,
        );
        //Calling a function of a controller from a controller
        (new UserPreferenceController)->createInitialUserPreference($data);

        $this->saveAvatarPath($user->id, $request);
        
        Auth::loginUsingId($user->id);
        return redirect('/');
    }

    public function saveAvatarPath(int $user_id, Request $request): void
    {
        if($request->hasFile('avatar')){
            // Store the icon to avatars folder under public folder
            $iconPath = $request->file('avatar')->storeAs(
                'avatars',
                // Set the name to id.imgExtension (e.g 1.jpg)
                $user_id.'.'.$request->file('avatar')->extension(),
                'public',
            );

            $test = User::where('id', $user_id)->update(['icon' => $iconPath]);
        }
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

    public function dupliEmail(Request $request): void
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
