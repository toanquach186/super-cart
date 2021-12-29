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

    public function addToCart($idCart, $idProduct, $quantity): \App\Models\CartItem
    {
        $product = $this->productRepository->find($idProduct);
        $cart = $this->cartRepository->find($idCart);
        if ($cart != null)
            return $this->cartItemRepository->add($cart, $product, $quantity);
        else {
            $this->cartRepository->create();
            $cartNew = $this->cartRepository->find($idCart);
            return $this->cartItemRepository->add($cartNew, $product, $quantity);
        }
    }

    public function editCart($id, $product_id, $quantity): bool
    {
        $cartItem = $this->findCartItemId($id);
        return $this->cartItemRepository->edit($cartItem, $product_id, $quantity);
    }

    public function findCartItemId(int $id): array
    {
        return $this->cartItemRepository->findCartItemId($id);
    }

    public function deleteAllItem(int $id): bool
    {
        return $this->cartItemRepository->deleteAllItemId($id);
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->cartItemRepository->getAll();
    }

    public function delete(int $id): bool
    {
        //$this->cartRepository->findOrFail($idCart);
        return $this->cartItemRepository->delete($id);
    }

    public function findCartId(int $id): \Illuminate\Database\Eloquent\Collection
    {
        return $this->cartItemRepository->findCartId($id);
    }
}
