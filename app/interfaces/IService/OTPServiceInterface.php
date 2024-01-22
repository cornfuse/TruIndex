<?php

namespace App\interfaces\IService;

use App\DTO\UserDTO\CreateOTPDTO;
interface OTPServiceInterface
{
    public function createOTP(CreateOTPDTO $data);
    public function deleteOTP($token);
    public function retrieveOTP(object $data);
}
