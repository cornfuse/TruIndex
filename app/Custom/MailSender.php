<?php

namespace App\Custom;

use App\Mail\UserVerificationMail;
use Illuminate\Support\Facades\Mail;

class MailSender
{
    public static  function sendVerificationMail(string $email, string | int $otp)
    {
        $mailData = ['token' => $otp, 'email' => $email];
        Mail::to($email)->send(new UserVerificationMail($mailData));
    }
}
