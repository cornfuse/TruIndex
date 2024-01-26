<?php

declare(strict_types=1);

namespace App\interfaces\IRepository;

use App\DTO\UserDTO\CreateUserDTO;
use App\DTO\UserDTO\LoginDTO;
use App\DTO\UserDTO\UserForgetPasswordDTO;
use App\DTO\UserDTO\UserResetPasswordDTO;

interface UserAuthRepositoryInterface
{
    public function create_user(CreateUserDTO $data);
    public function login_user(LoginDTO $data);
    public function verify_user(object $data);
    public function  reset_password(UserResetPasswordDTO $data);

    public  function  forget_password(UserForgetPasswordDTO $data);


}
