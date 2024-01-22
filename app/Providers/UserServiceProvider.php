<?php

namespace App\Providers;

use App\interfaces\IService\OTPServiceInterface;
use App\interfaces\IService\UserAuthServiceInterface;
use App\services\User\OTPService;
use App\services\User\UserAuthService;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserAuthServiceInterface::class,UserAuthService::class);
        $this->app->bind(OTPServiceInterface::class,OTPService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
