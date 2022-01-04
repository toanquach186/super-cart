<?php

namespace App\Providers;

use App\Http\Controllers\PaymentController;
use App\Interfaces\IPayment;
use App\Models\Payment;
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
        $this->app->when(PaymentController::class)
            ->needs(IPayment::class)
            ->give(function () {
                return request()->request->get('method') === 'HappyPay'
                    ? $this->app->get(HappyPayService::class)
                    : $this->app->get(EcoPayService::class);
            });
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
