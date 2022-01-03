<?php

namespace App\Http\Controllers;

use App\Interfaces\IPayment;
use App\Services\EcoPayService;
use App\Services\HappyPayService;

class PaymentController extends Controller
{

    private IPayment $IPayment;

    public function __construct(IPayment $IPayment)
    {
        $this->IPayment = $IPayment;
    }

    public function pay($method)
    {
        if($method == 'HappyPay') app()->bind(IPayment::class,HappyPayService::class);
        elseif ($method == 'EcoPay') app()->bind(IPayment::class,EcoPayService::class);
        else return 'no';
        //app()->make(IPayment::class);
        return $this->IPayment->pay();
    }
}
