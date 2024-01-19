<?php

declare(strict_types=1);

namespace App\interfaces\IService;

use Illuminate\Http\Request;

interface  UserAuthServiceInterface
{
    public function create_user(Request $request);

    public function login_user(Request $request);

    public function verify_user(Request $request);

    public function forget_password(Request $request);

    public  function reset_password(Request $request);
}
