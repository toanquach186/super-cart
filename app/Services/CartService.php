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
        $this->cartItemService->deleteAllId($id);
        return $this->repository->delete($id);
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->repository->getAll();
    }

    public function updatePrice(int $id, $price): bool
    {
        return $this->repository->updatePrice($id, $price);
    }

    public function calculatePrice($id): float|int
    {
        $cartItem = $this->cartItemService->findCartId($id);
        $price = 0;
        foreach ($cartItem as $item) {
            $price += $item['price'] * $item['quantity'];
        }
        $this->updatePrice($id, $price);
        return $price;
    }
}
