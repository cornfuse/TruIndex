<?php

namespace App\services\User;

use App\DTO\UserDTO\CreateUserDTO;
use App\Exceptions\CustomValidationException;
use App\interfaces\IRepository\UserAuthRepositoryInterface;
use App\interfaces\IService\UserAuthServiceInterface;
use Illuminate\Http\Request;
use Validator;
use Str;

class UserAuthService implements UserAuthServiceInterface
{
    public function __construct(UserAuthRepositoryInterface $userAuthRepository)
    {
         $this->userAuthRepository = $userAuthRepository;
    }
    public function create_user(Request $request){
        $validator = Validator::make($request->all(),[
            "email"=>"required|email|unique:users",
            "password"=>"required"
        ]);

        if($validator->fails()){
            throw new CustomValidationException($validator);
        }

        $data = new CreateUserDTO(...$request->all());

        $this->userAuthRepository->create_user($data);

        //send confirmation email to the user

        $token = Str::random(8);






    }

    public function login_user(Request $request){}

    public function verify_user(Request $request){}

    public function forget_password(Request $request){}

    public  function reset_password(Request $request){}
}
