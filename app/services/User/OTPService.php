<?php

namespace App\services\User;

use App\DTO\UserDTO\CreateOTPDTO;
use App\interfaces\IService\OTPServiceInterface;
use App\interfaces\IRepository\OTPRepositoryInterface;



class OTPService implements OTPServiceInterface
{
    public function __construct(OTPRepositoryInterface $otpRepository)
    {
        $this->otpRepository = $otpRepository;
    }
    public function createOTP(CreateOTPDTO $data)
    {
        return $this->otpRepository->createOTP($data);
    }
    public function deleteOTP($token)
    {
        return $this->otpRepository->deleteOTP($token);
    }
    public function retrieveOTP(object $data)
    {
        return $this->otpRepository->retrieveOTP($data);
    }
}
