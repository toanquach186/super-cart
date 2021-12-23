<?php

namespace App\Repositories;

use App\Models\Cart;

class CartRepository
{
    function create()
    {
        return Cart::create([
            'total_price' => 0
        ]);

    }

    public function find(int $id):Cart
    {
        return Cart::find($id);
    }

    public function delete(int $id)
    {
        return Cart::where('id', $id)->delete();
    }

    public function getAll(): array|\Illuminate\Database\Eloquent\Collection
    {
        return Cart::all();
    }

    public function updatePrice($id, $price)
    {
        return Cart::where('id',$id)->update(['total_price' => $price]);
    }
}
