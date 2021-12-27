<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function find(int $id):array
    {
        return Product::find($id)->toArray();
    }

    public function all(): \Illuminate\Database\Eloquent\Collection|array
    {
        return Product::all();
    }
}
