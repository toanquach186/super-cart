<?php

namespace App\Http\Controllers;

use App\Interfaces\IPayment;
use App\Services\EcoPayService;

class EcoPayController extends Controller implements IPayment
{
    private EcoPayService $ecoPayService;

    public function __construct(EcoPayService $ecoPayService)
    {
        $this->ecoPayService = $ecoPayService;
    }

    public function pay()
    {
        return $this->ecoPayService->pay();
    }
}
