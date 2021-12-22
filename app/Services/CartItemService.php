<?php

namespace App\Services;

use App\Repositories\CartItemRepository;

class CartItemService
{
    private CartItemRepository $cartItemRepository;

    public function __construct(CartItemRepository $cartItemRepository)
    {
        $this->cartItemRepository = $cartItemRepository;
    }

    public function addCart($cart_id, $product_id, $quantity, $price)
    {
        $this->cartItemRepository->add($cart_id, $product_id, $quantity, $price);
    }
    public function editCart($id, $product_id, $quantity){
        $this->cartItemRepository->edit($id, $product_id, $quantity);
    }
}
