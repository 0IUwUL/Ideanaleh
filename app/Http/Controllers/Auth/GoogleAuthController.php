<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\UserPreferenceController;
use Str;
use App\Services\EmailService;

//Import model
use App\Models\User;
use App\Models\UserPreference; 

class GoogleAuthController extends Controller
{
    public function googleLoginUser(Request $request): Object
    {
        // Decode JWT token from google 
        
        $userInfo = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $request->credential)[1]))));

        $user = User::where('email', '=', $userInfo->email)->first();

        if ($user) {
            if ($user->active)
                return $this->_loginUser($request, $user);
            else
                // Fix: Notify that the user is restricted using toasts
                return redirect()->back();
        }
        else {
            // Register when the user is not yet registered when they try to sign in with google
            return $this->registerUser($request, $userInfo);
        }

    }

    private function registerUser(Request $request, Object $userInfo): Object
    {
        
        $user = new User;
        $user->Lname = $userInfo->family_name;
        $user->Fname = $userInfo->given_name;
        $user->email = $userInfo->email;
        $user->password = $temp_password = Str::random(6);
        $user->dev_mode = 1;
        $user->save();

        $data = array(
            'id' => $user->id,
            'pref_projs' => null
        );

        //Calling a function of a controller from a controller
        (new UserPreferenceController)->createInitialUserPreference($data);

        $message = "Here is your temporary password. You can change it in Settings > Account tab";
        (new EmailService)->verification($user, $message, $temp_password);

        // Auto Login the user when they sign up with google?
        $currentUser = User::where('email', '=', $userInfo->email)->first();
        return $this->_loginUser($request, $currentUser);
    }

    /**
     * Second parameter only accepts variable type of Object
     * Explicitly set to prevent errors
     */
    private function _loginUser(Request $request, Object $user): Object
    {
        //$request->session()->put('loginId', $user->id);
        Auth::loginUsingId($user->id);
        $follow = UserPreference::where('user_id', '=', $user->id)
                                ->select('followed')
                                ->first()
                                ->toArray();
        $mode = User::where('id', '=', $user->id)
                                ->select('dev_mode')
                                ->first()
                                ->toArray();
        // set session if admin
        $request->session()->put('admin', $user->admin);

        if($follow['followed'])
            $request->session()->put('mode', $mode['dev_mode']);
        else
            $request->session()->put('mode', 3);

        return (redirect('/'));
    }
}
