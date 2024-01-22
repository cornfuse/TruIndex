<?php

namespace App\interfaces\IRepository;

use App\DTO\UserDTO\CreateOTPDTO;

interface OTPRepositoryInterface
{
    public function createOTP(CreateOTPDTO $data);
    public function deleteOTP($token);
    public function retrieveOTP(object $data);
}
