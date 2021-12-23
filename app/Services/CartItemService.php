<?php

namespace App\Services;

use App\Repositories\CartItemRepository;
use PhpParser\Node\Expr\Cast\Double;

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

    public function findCartItemId(int $id)
    {
        return $this->cartItemRepository->findCartItemId($id);
    }

    public function deleteAllId(int $id)
    {
        return $this->cartItemRepository->deleteAllId($id);
    }

    public function getAll()
    {
        return $this->cartItemRepository->getAll();
    }

    public function groupBy(int $id)
    {
        return $this->cartItemRepository->groupBy($id);
    }

    public function delete(int $id)
    {
        return $this->cartItemRepository->delete($id);
    }

    public function findCartId(int $id)
    {
        return $this->cartItemRepository->findCartId($id);
    }

    public function mulPrice($cartItem)
    {
        foreach ($cartItem as $item) {
            $priceeree += $item['price']*$item['quantity'] ;
            echo $priceeree;
            echo(' ');
        }
    }
}
