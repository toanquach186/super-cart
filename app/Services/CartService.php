<?php

namespace App\Services;

use App\Repositories\CartRepository;

class CartService
{
    private CartRepository $repository;
    private CartItemService $cartItemService;

    public function __construct(CartRepository $repository, CartItemService $cartItemService)
    {
        $this->repository = $repository;
        $this->cartItemService = $cartItemService;
    }

    public function createCart(): array
    {
        return $this->repository->create();
    }

    public function find(int $id): array
    {
        return $this->repository->find($id);
    }

    public function delete(int $id): bool
    {
        $this->cartItemService->deleteAllItem($id);
        return $this->repository->delete($id);
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->repository->getAll();
    }

    public function updatePrice($id, $price): bool
    {
        return $this->repository->updatePrice($id, $price);
    }

    public function calculatePrice(): float|int
    {
        $idCart = session()->get('current_cart');
        $cartItem = $this->cartItemService->findCartId($idCart);
        $price = 0;
        foreach ($cartItem as $item) {
            $price += $item['price'] * $item['quantity'];
        }
        $this->updatePrice($idCart, $price);
        return $price;
    }
}
