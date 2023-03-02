<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\EmailService;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function searchEmail(Request $request): void
    {
        $user = User::firstWhere('email', $request->email);

        if($user) {
            // Generate six digit code
            $code = random_int(0,999999); 

            // Adjust and save to DB
            $user->code = str_pad($code, 6, 0, STR_PAD_LEFT);
            $user->save();
            
            // Customize messagge
            $message = 'To reset your password, please enter the code below';
            (new EmailService)->verification($user, $message, $user->code);

            $response = 'success';
        }
    
        echo json_encode(['response' => $response ?? null]);
    }

    public function updatePassword(Request $request): Object
    {
        $user = User::firstWhere('email', $request->email);
        $user->password = $request->newPass;
        $user->save();

        return redirect('home');
    }


}
