<?php

namespace App\Http\Controllers;

use App\Interfaces\IPayment;
use App\Services\HappyPayService;

class HappyPayController extends Controller
{

    private IPayment $IPayment;

    public function __construct(IPayment $IPayment)
    {

        $this->IPayment = $IPayment;
    }

    public function payment($method)
    {
        return $this->IPayment->pay($method);
    }

    public function edit()
    {

    }

    public function destroy()
    {

    }
}
