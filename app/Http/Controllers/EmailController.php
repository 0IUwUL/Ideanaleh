<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerification;

//Import model
use App\Models\User; 

class EmailController extends Controller
{
    //
    public function sendCode(Request $request)
    {
    $userId = $request->session()->get('loginId');
    
    $user = User::where('id', $userId)->first();
    
    // Generate six digit code
    $code = random_int(0,999999);  
    $code = str_pad($code, 6, 0, STR_PAD_LEFT);
    $emailDetails = [
        'header' => 'Hello '.$user->Fname,
        'body' => 'To verify your email, please enter the code below',
        'code' => $code,
    ];

    User::where('id', $userId)->update(['code' => $code]);
    // Send email
    Mail::to($user->email)->send(new EmailVerification($emailDetails));
    
    }

    public function verify(Request $request)
    {
        $userId = $request->session()->get('loginId');
        $user = User::where('id', $userId)->first();

        if($request->code == $user->code) {
            $json_data = array("response" => "success");
        }
        else {
            $json_data = array("response" => "fail");
        }
        
        echo json_encode($json_data);
    }
}
