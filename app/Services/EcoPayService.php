<?php

namespace App\Services;

use App\Repositories\CartRepository;
use App\Repositories\EcoPayRepository;

class EcoPayService
{
    private EcoPayRepository $ecoPayRepository;
    private CartRepository $cartRepository;

    public function __construct(EcoPayRepository $ecoPayRepository, CartRepository $cartRepository)
    {
        $this->ecoPayRepository = $ecoPayRepository;
        $this->cartRepository = $cartRepository;
    }

    public function pay()
    {
        $idCart = session()->get('current_cart');
        $cart = $this->cartRepository->findOrFail($idCart);
        return $this->ecoPayRepository->add($cart);
    }
}
