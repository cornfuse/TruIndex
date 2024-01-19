<?php

namespace App\services\User;

use App\interfaces\IService\UserAuthServiceInterface;
use Illuminate\Http\Request;
use Validator;

class UserAuthService implements UserAuthServiceInterface
{
    public function create_user(Request $request){
        $validator = Validator::make($request->all(),[
            "email"=>"required|email"
        ]);
    }

    public function login_user(Request $request){}

    public function verify_user(Request $request){}

    public function forget_password(Request $request){}

    public  function reset_password(Request $request){}
}
