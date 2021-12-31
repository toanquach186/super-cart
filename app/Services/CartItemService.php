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

    public function addToCart($idProduct, $quantity): \App\Models\CartItem
    {
        $idCart = (integer)session()->get('current_cart');
        $product = $this->productRepository->find($idProduct);
        if ($idCart != null)
            return $this->cartItemRepository->add($idCart, $product, $quantity);
        else {
            $this->cartRepository->create();
            return $this->cartItemRepository->add($idCart, $product, $quantity);
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

    public function findCartId($id):array
    {
        return $this->cartItemRepository->findCartId($id);
    }
}
