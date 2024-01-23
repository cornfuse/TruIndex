<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\interfaces\IService\UserAuthServiceInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use PHPUnit\Event\Code\Throwable;

class UserAuthController extends Controller
{

    use ApiResponse;

    private UserAuthServiceInterface $userAuthService;
    public  function  __construct(UserAuthServiceInterface $userAuthService)
    {
        $this->userAuthService = $userAuthService;
    }

    public function create_user(Request $request){
        try {
              $result = $this->userAuthService->create_user($request);
              return $this->success("user created successfully",$result,201);
        }catch (\Throwable $e){
            return $this->fail($e->getMessage());
        }
    }

    public function login_user(Request $request){
        try {

        }catch (\Throwable $e){
            return $this->fail($e->getMessage());
        }
    }

    public function verify_user(Request $request){
        try {
           $result =  $this->userAuthService->verify_user($request);
           return $this->success("user verified successfully",$result,200);
        }catch (\Throwable $e){
            return $this->fail([$e->getMessage(),$e->getFile(),$e->getLine()]);
        }
    }

    public function forget_password(Request $request){
        try {

        }catch (\Throwable $e){
            return $this->fail($e->getMessage());
        }
    }

    public  function reset_password(Request $request){
        try {

        }catch (\Throwable $e){
            return $this->fail($e->getMessage());
        }
    }


}
