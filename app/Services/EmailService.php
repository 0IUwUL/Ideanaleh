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

    public function inform(string $name, string $email, string $subject, string $message): void
    {
        $emailDetails = [
            'subject' => $subject,
            'header' => $name,
            'body' => $message,
        ];

        // Send email
        Mail::to($email)->send(new InformUser($emailDetails));
    }
}