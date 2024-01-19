<?php

declare(strict_types=1);

namespace App\DTO\UserDTO;

class CreateUserDTO{
    public  function __construct(public string $email, public string $password)
    {

    }
}
