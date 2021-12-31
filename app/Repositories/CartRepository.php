<?php

namespace App\Repositories;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;


class CartRepository
{
    function create():array
    {
        $id = Auth::id();

        $cart = Cart::create([
            'user_id' => $id,
            'total_price' => 0
        ])->toarray();
        if (session()->has('current_cart')) {
            session()->put('current_cart',(int)$cart['id']);
        }else session()->push('current_cart',(int)$cart['id']);
        return $cart;
    }

    public function find(int $id)/////////////////////////////////
    {
        return Cart::find($id);
    }
    public function findOrFail(int $id):array
    {
        return Cart::findOrFail($id)->toarray();
    }

    public function delete(int $id):bool
    {
        return Cart::where('id', $id)->delete();
    }

    public function getAll(): array|\Illuminate\Database\Eloquent\Collection
    {
        return Cart::all();
    }

    public function updatePrice($id, $price):bool
    {
        return Cart::where('id',$id)->update(['total_price' => $price]);
    }
    public function viewAllCart($id): array|\Illuminate\Database\Eloquent\Collection
    {
        return Cart::where('user_id', $id)->get();
    }
}
