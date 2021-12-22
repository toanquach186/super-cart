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

    public function addCart($cart_id, $product, $quantity)
    {
        return $this->cartItemRepository->add($cart_id, $product, $quantity);
    }

    public function editCart($id, $product_id, $quantity)
    {
        return $this->cartItemRepository->edit($id, $product_id, $quantity);
    }

    public function find(int $id)
    {
        return $this->cartItemRepository->find($id);
    }

    public function deleteAllId(int $id)
    {
        return $this->cartItemRepository->deleteAllId($id);
    }
    public function getAll(){
        return $this->cartItemRepository->getAll();
    }
    public function groupBy(int $id){
        return $this->cartItemRepository->groupBy($id);
    }
}
