<?php

namespace App\repository;

use App\DTO\UserDTO\CreateUserDTO;
use App\DTO\UserDTO\LoginDTO;
use App\interfaces\IRepository\UserAuthRepositoryInterface;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserAuthRepository implements UserAuthRepositoryInterface
{
    private User $userModel;
    public  function __construct(User $userModel)
    {
         $this->userModel = $userModel;
    }
    public function create_user(CreateUserDTO $data){
       return $this->userModel::create([
            "email"=>$data->email,
           "password" => Hash::make($data->password)
       ]);
    }

    public function login_user(LoginDTO $data){
       $user = $this->userModel::where("email",$data->email)->first();

    }

    public  function verify_user(object $data)
    {
       #find user and update the email verified at field
       $user = $this->userModel::find($data->user_id);
       $user->email_verified_at = Carbon::now();
       $user->save();
    }

}
