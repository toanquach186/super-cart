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

    public function find(int $id): array
    {
        return $this->productRepository->find($id);
    }
    public function all(): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->productRepository->all();
    }
}
