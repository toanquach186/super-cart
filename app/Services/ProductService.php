<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function find(int $id)
    {
        return $this->productRepository->find($id);
    }
    public function all(){
        return $this->productRepository->all();
    }
}
