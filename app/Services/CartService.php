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
    public function createCart(){
        $this->repository->create();
    }

}
