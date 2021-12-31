<?php

namespace App\Services;

use App\Interfaces\IPayment;
use App\Repositories\CartRepository;
use App\Repositories\HappyPayRepository;

class HappyPayService implements IPayment
{
    private HappyPayRepository $paymentRepository;
    private CartRepository $cartRepository;

    public function __construct(HappyPayRepository $paymentRepository, CartRepository $cartRepository)
    {
        $this->paymentRepository = $paymentRepository;
        $this->cartRepository = $cartRepository;
    }

    public function pay($method)
    {
        $idCart = session()->get('current_cart');
        $cart = $this->cartRepository->findOrFail($idCart);
        $this->paymentRepository->add($cart, $method);
    }
    public function edit(){

    }
}
