<?php

namespace App\Http\Controllers;

use App\Interfaces\IPayment;
use App\Services\HappyPayService;

class HappyPayController extends Controller implements IPayment
{

    private HappyPayService $happyPayService;

    public function __construct(HappyPayService $happyPayService)
    {

        $this->happyPayService = $happyPayService;

    }

    public function pay(): \App\Models\Payment
    {
        return $this->happyPayService->pay();
    }
}
