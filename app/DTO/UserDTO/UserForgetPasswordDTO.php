<?php

namespace App\DTO\UserDTO;

 class UserForgetPasswordDTO {
     public function __construct(public string $email)
     {}
 }
