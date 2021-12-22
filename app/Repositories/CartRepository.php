<?php

namespace App\Repositories;

use App\Models\Cart;

class CartRepository
{
    function create()
    {
        return Cart::create([
            'price' => 0
        ]);

    }

    public function find(int $id)
    {
        return Cart::find($id);
    }

    public function delete(int $id)
    {
        return Cart::where('id', $id)->delete();
    }

    function createwithId(int $id)
    {
        return Cart::create([
            'id' => $id,
            'price' => 0
        ]);

    }

    public function getAll()
    {
        return Cart::all();
    }
}
