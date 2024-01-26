<?php

namespace App\repository;

use App\DTO\UserDTO\CreateUserDTO;
use App\DTO\UserDTO\LoginDTO;
use Illuminate\Support\Facades\DB;
use App\DTO\UserDTO\UserForgetPasswordDTO;
use App\DTO\UserDTO\UserResetPasswordDTO;
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

       if($user->email_verified_at == null){
           throw new \Exception("Account has not been verified");
       }
       #compare passwords
        $comparePasswords = \password_verify($data->password, $user->password);
        if (!$comparePasswords) {
            throw new \Exception("Password does not match", 1);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;
        return [
            'type' => 'user',
            'token' => $token,
            'data' => $user,
        ];
    }

    public  function verify_user(object $data)
    {
       #find user and update the email verified at field
       $user = $this->userModel::find($data->user_id);
       $user->email_verified_at = Carbon::now();
       $user->save();
    }


    public function forget_password(UserForgetPasswordDTO $data){
        $email = $data->email;
        $token = $data->token;
        // Check if the email exists in the password_reset_tokens table
        $existingToken = DB::table('password_reset_tokens')->where('email', $email)->first();

        if ($existingToken) {
            // If the email exists, update the existing row
            DB::table('password_reset_tokens')
                ->where('email', $email)
                ->update([
                    'token' => $token,
                    'created_at' => now(),
                ]);
        } else {
            // If the email doesn't exist, insert a new record
            DB::table('password_reset_tokens')->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => now(),
            ]);
        }

    }


    public function reset_password(UserResetPasswordDTO $data)
    {
        $selectedRows = DB::table('password_reset_tokens')
            ->select('email')
            ->where('token', '=', $data->otp)
            ->get();

        if ($selectedRows->count() == 0) {
            throw new \Exception("Invalid OTP");
        }

        //   $selectedRows[0]->email;
        $userId = $this->userModel::where('email', $selectedRows[0]->email)->first();

        #update the password
        $userId->update([
            'password' => Hash::make($data->password),
        ]);
        #delete the token
        return DB::statement("DELETE FROM password_reset_tokens WHERE email = ? AND token = ? ", [$selectedRows[0]->email, $data->otp]);
    }

}
