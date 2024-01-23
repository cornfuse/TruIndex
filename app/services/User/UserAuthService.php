<?php

namespace App\services\User;

use App\Custom\MailSender;
use App\DTO\UserDTO\CreateOTPDTO;
use App\DTO\UserDTO\CreateUserDTO;
use App\Exceptions\CustomValidationException;
use App\interfaces\IRepository\UserAuthRepositoryInterface;
use App\interfaces\IService\OTPServiceInterface;
use App\interfaces\IService\UserAuthServiceInterface;
use Illuminate\Http\Request;
use Validator;
use Str;

class UserAuthService implements UserAuthServiceInterface
{
    public function __construct(UserAuthRepositoryInterface $userAuthRepository,OTPServiceInterface $otpService)
    {
         $this->userAuthRepository = $userAuthRepository;
         $this->otpService = $otpService;
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
        $user = $this->userAuthRepository->create_user($data);
        //send confirmation email to the user
        $token = Str::random(8);
        $otpData = new CreateOTPDTO($user->id,$token);
        $otpService = $this->otpService->createOTP($otpData);
        #send mail
        MailSender::sendVerificationMail($request->email,$token);
    }

    public function verify_user(Request $request){
        $validator = Validator::make($request->all(),[
            "token"=>"required|exists:o_t_p_s"
        ]);
        if($validator->fails()){
            throw new CustomValidationException($validator);
        }
        $data = (object)["token"=>$request->token];
        #retrieve otp
        $otpData = $this->otpService->retrieveOTP($data);
        #pick out the user id and verify the user
        $userData =  (object)["user_id"=>$otpData->user_id];
        $this->userAuthRepository->verify_user($userData);
        #delete otp
        $this->otpService->deleteOTP($otpData->token);

        # send an onboarding mail to the user
    }

    public function login_user(Request $request){
        $validator = Validator::make($request->all(),[
            "email"=>"required|email|exists:users",
            "password"=>"required"
        ]);
        if($validator->fails()){
            throw new CustomValidationException($validator);
        }

    }

    public function forget_password(Request $request){}

    public  function reset_password(Request $request){}
}
