<?php

namespace App\Services;

use App\Repositories\CartRepository;
use Illuminate\Support\Facades\Auth;

class CartService
{
    private CartRepository $repository;
    private CartItemService $cartItemService;

    public function __construct(CartRepository $repository, CartItemService $cartItemService)
    {
        $this->repository = $repository;
        $this->cartItemService = $cartItemService;
    }

    public function createCart()
    {
        return $this->repository->create();
    }

    public function find(int $id): array
    {
        $find = $this->repository->find($id);
        return $find->toarray();
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

    public function calculate($id): float|int
    {
        $cartItem = $this->cartItemService->findCartId($id);
        $price = 0;
        foreach ($cartItem as $item) {
            $price += $item['price'] * $item['quantity'];
        }
        return $price;
    }
}
