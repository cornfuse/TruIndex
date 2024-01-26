<?php

namespace App\Providers;

use App\interfaces\IService\ContentServiceInterface;
use App\interfaces\IService\OTPServiceInterface;
use App\interfaces\IService\UserAuthServiceInterface;
use App\services\contentService\ContentService;
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
        $this->app->bind(ContentServiceInterface::class,ContentService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
