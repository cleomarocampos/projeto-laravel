<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\CarRepositoryInterface;
use App\Contracts\UserRepositoryInterface;
use App\Repository\Eloquent\CarRepository;
use App\Repository\Eloquent\UserRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(CarRepositoryInterface::class, CarRepository::class);
    }
}
