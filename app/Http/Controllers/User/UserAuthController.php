<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use PHPUnit\Event\Code\Throwable;

class UserAuthController extends Controller
{

    use ApiResponse;
    public  function  __construct()
    {

    }

    public function create_user(Request $request){
        try {

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

        }catch (\Throwable $e){
            return $this->fail($e->getMessage());
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
