<?php

namespace App\Providers;

use App\Interfaces\IPayment;
use App\Services\EcoPayService;
use App\Services\HappyPayService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IPayment::class, EcoPayService::class);
        $this->app->bind(IPayment::class, HappyPayService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
