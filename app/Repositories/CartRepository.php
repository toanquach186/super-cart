<?php

namespace App\Repositories;

use App\Models\Cart;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Js;
use Psy\Util\Json;

class CartRepository
{
    function create():Cart
    {
        return Cart::create([
            'total_price' => 0
        ]);

    }

    public function find(int $id)//error return type
    {
        return Cart::find($id);
    }
    public function findOrFail(int $id):Cart
    {
        return Cart::findOrFail($id);
    }

    public function delete(int $id):Cart
    {
        return Cart::where('id', $id)->delete();
    }

    public function getAll(): array|\Illuminate\Database\Eloquent\Collection
    {
        return Cart::all();
    }

    public function updatePrice($id, $price):Cart
    {
        return Cart::where('id',$id)->update(['total_price' => $price]);
    }
}
