<?php

namespace App\DTO\UserDTO;

class CreateOTPDTO
{
    public function __construct(public readonly string $user_id, public readonly string $token)
    {}
}
