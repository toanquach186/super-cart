<?php

namespace App\Services;

use App\Interfaces\IPayment;
use App\Repositories\CartRepository;
use App\Repositories\HappyPayRepository;

class HappyPayService implements IPayment
{
    private HappyPayRepository $happyPayRepository;
    private CartRepository $cartRepository;

    public function __construct(HappyPayRepository $paymentRepository, CartRepository $cartRepository)
    {
        $this->happyPayRepository = $paymentRepository;
        $this->cartRepository = $cartRepository;
    }

    public function pay(): \App\Models\Payment
    {
        $idCart = session()->get('current_cart');
        $cart = $this->cartRepository->findOrFail($idCart);
        return $this->happyPayRepository->add($cart);
    }
    public function edit(){

    }
}
