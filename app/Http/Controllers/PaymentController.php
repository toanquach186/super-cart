<?php

namespace App\Http\Controllers;

use App\Interfaces\IPayment;

class PaymentController extends Controller
{

    private IPayment $IPayment;

    public function __construct(IPayment $IPayment)
    {
        $this->IPayment = $IPayment;
    }

    public function pay()
    {
        return $this->IPayment->pay();
    }
}
