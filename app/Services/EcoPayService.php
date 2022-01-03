<?php

namespace App\Services;

use App\Interfaces\IPayment;
use App\Repositories\CartRepository;
use App\Repositories\EcoPayRepository;

class EcoPayService implements IPayment
{
    private EcoPayRepository $ecoPayRepository;
    private CartRepository $cartRepository;

    public function __construct(EcoPayRepository $ecoPayRepository, CartRepository $cartRepository)
    {
        $this->ecoPayRepository = $ecoPayRepository;
        $this->cartRepository = $cartRepository;
    }

    /**
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function pay(): array
    {
        $idCart = session()->get('current_cart');
        $cart = $this->cartRepository->findOrFail($idCart);
        return $this->ecoPayRepository->add($cart);
    }
}
