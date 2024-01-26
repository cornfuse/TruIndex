<?php

namespace App\DTO\UserDTO;

class UserResetPasswordDTO{
    public function __construct(public string $password, public int | string $otp)
    {}

}
