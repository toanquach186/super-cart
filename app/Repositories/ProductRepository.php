<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function find(int $id)
    {
        return Product::findOrFail($id);
    }

    public function all(): \Illuminate\Database\Eloquent\Collection|array
    {
        return Product::all();
    }
}
