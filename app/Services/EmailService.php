<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerification;
use App\Mail\InformUser;

class EmailService {

    public function verification(Object $user, string $message, string $code): void
    {
        $emailDetails = [
            'header' => $user->Fname,
            'body' => $message,
            'code' => $code,
        ];

        // Send email
        Mail::to($user->email)->send(new EmailVerification($emailDetails));
    }

    public function inform(Object $user, string $subject, string $message): void
    {
        $emailDetails = [
            'subject' => $subject,
            'header' => $user->Fname,
            'body' => $message,
        ];

        // Send email
        Mail::to($user->email)->send(new InformUser($emailDetails));
    }
}