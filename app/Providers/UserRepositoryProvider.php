<?php

namespace App\Providers;

use App\interfaces\IRepository\OTPRepositoryInterface;
use App\interfaces\IRepository\UserAuthRepositoryInterface;
use App\repository\OTPRepository;
use App\repository\UserAuthRepository;
use Illuminate\Support\ServiceProvider;

class UserRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserAuthRepositoryInterface::class,UserAuthRepository::class);
        $this->app->bind(OTPRepositoryInterface::class,OTPRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
