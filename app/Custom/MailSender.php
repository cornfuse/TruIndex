<?php

namespace App\Custom;

use App\Mail\UserResetPasswordMail;
use App\Mail\UserVerificationMail;
use Illuminate\Support\Facades\Mail;

class MailSender
{
    public static  function sendVerificationMail(string $email, string | int $otp):void
    {
        $mailData = ['token' => $otp, 'email' => $email];
        Mail::to($email)->send(new UserVerificationMail($mailData));
    }

    public  static  function  sendUserForgetPasswordMail(string $email,string | int $otp):void
    {
        $mailData = ['token'=>$otp,'email'=>$email];
        Mail::to($email)->send(New UserResetPasswordMail($mailData));
    }
}
