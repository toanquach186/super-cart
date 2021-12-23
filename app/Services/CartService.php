<?php

namespace App\Services;

use App\Repositories\CartRepository;

class CartService
{
    private CartRepository $repository;

    public function __construct(CartRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createCart()
    {
        return $this->repository->create();
    }

    public function find(int $id): \App\Models\Cart
    {
        return $this->repository->find($id);
    }

    public function delete(int $id){
        return $this->repository->delete($id);
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->repository->getAll();
    }
    public function updatePrice(int $id, $price){
        return $this->repository->updatePrice($id, $price);
    }
}
