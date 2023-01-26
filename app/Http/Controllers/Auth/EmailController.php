<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerification;
use Auth;
use App\Actions\Verification;

//Import model
use App\Models\User; 

class EmailController extends Controller
{
    // Temporary alternative before utilizing
    // the default VerificationController

    public function sendCode(Request $request): void
    { 
        $user = Auth::user();
        
        // Generate six digit code
        $code = random_int(0,999999);  
        $code = str_pad($code, 6, 0, STR_PAD_LEFT);

        $message = 'To verify your email, please enter the code below';
        $this->sendEmail($user, $message, $code);

        // Send the code to the database
        User::where('id', $user->id)->update(['code' => $code]);
    
    }

    public function sendEmail(Object $user, string $message, string $code): string
    {
        $emailDetails = [
            'header' => $user->Fname,
            'body' => $message,
            'code' => $code,
        ];
        // Send email
        Mail::to($user->email)->send(new EmailVerification($emailDetails));

        return $code;
    }

    public function updateDev(Request $request): void
    {
        $user = Auth::user();

        if((new Verification)->handle($request)) {
            User::where('id', $user->id)->update(['dev_mode' => '1']);
            $response = "success";
        }
        
        echo json_encode(['response' => $response ?? null]);
    }

}
