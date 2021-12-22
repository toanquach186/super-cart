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

    public function find(int $id)
    {
        return $this->repository->find($id);
    }

    public function delete(int $id){
        return $this->repository->delete($id);
    }

    public function createWithId(int $id){
        return $this->repository->createwithId($id);
    }

    public function getAll(){
        return $this->repository->getAll();
    }
}
