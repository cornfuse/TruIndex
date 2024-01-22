<?php

declare(strict_types=1);

namespace App\interfaces\IRepository;

use App\DTO\UserDTO\CreateUserDTO;
use App\DTO\UserDTO\LoginDTO;

interface UserAuthRepositoryInterface
{
    public function create_user(CreateUserDTO $data);

    public function login_user(LoginDTO $data);
}
