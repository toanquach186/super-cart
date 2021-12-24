<?php

namespace App\Services;

use App\Repositories\CartItemRepository;
use App\Repositories\CartRepository;
use App\Repositories\ProductRepository;

class CartItemService
{
    private CartItemRepository $cartItemRepository;
    private ProductRepository $productRepository;
    private CartRepository $cartRepository;

    public function __construct(CartItemRepository $cartItemRepository, ProductRepository $productRepository, CartRepository $cartRepository)
    {
        $this->cartItemRepository = $cartItemRepository;
        $this->productRepository = $productRepository;
        $this->cartRepository = $cartRepository;
    }

    public function addCart($idCart, $idProduct, $quantity): \App\Models\CartItem
    {
        $product = $this->productRepository->find($idProduct);
        $cart = $this->cartRepository->find($idCart);
        if ($cart != null)
            return $this->cartItemRepository->add($cart, $product, $quantity);
        else {
            $this->cartRepository->create();
            $cart2 = $this->cartRepository->find($idCart);
            return $this->cartItemRepository->add($cart2, $product, $quantity);
        }
    }

    public function editCart($id, $product_id, $quantity):bool
    {
        $cartItem = $this->findCartItemId($id);
        return $this->cartItemRepository->edit($cartItem, $product_id, $quantity);
    }

    public function findCartItemId(int $id): \App\Models\CartItem
    {
        return $this->cartItemRepository->findCartItemId($id);
    }

    public function deleteAllId(int $id): \App\Models\CartItem
    {
        return $this->cartItemRepository->deleteAllId($id);
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->cartItemRepository->getAll();
    }

    public function groupBy(int $id)
    {
        return $this->cartItemRepository->groupBy($id);
    }

    public function delete(int $id)
    {
        $this->cartRepository->findOrFail($id);
        return $this->cartItemRepository->delete($id);
    }

    public function findCartId(int $id)
    {
        return $this->cartItemRepository->findCartId($id);
    }
}
