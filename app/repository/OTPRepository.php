<?php

namespace App\repository;

use App\DTO\UserDTO\CreateOTPDTO;
use App\interfaces\IRepository\OTPRepositoryInterface;
use App\Models\OTP;

class OTPRepository implements OTPRepositoryInterface
{
    public function __construct(OTP $otpModel)
    {
        $this->otpModel = $otpModel;
    }
    public function createOTP(CreateOTPDTO $data)
    {
        return $this->otpModel::create([
            'token' => $data->token,
            "user_id" => $data->user_id,

        ]);
    }
    public function deleteOTP($token)
    {
        $otp = $this->otpModel::where('token', $token)->first();

        return $otp->delete();
    }
    public function retrieveOTP(object $data)
    {
        return $this->otpModel::where('token', $data->token)->first();
    }
}
