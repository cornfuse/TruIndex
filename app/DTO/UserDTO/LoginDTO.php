<?php

declare(strict_types=1);

namespace App\DTO\UserDTO;

class LoginDTO{
    public  function __construct(public string $email, public string $password)
    {

    }
}
