<?php

namespace App\Repositories;

use App\Models\CartItem;

class CartItemRepository
{
    function add($cart_id, $product_id, $quantity)
    {
        return CartItem::create([
            'cart_id' => $cart_id,
            'product_id' => $product_id,
            'quantity' => $quantity,
        ]);
    }

    function edit($id, $product_id, $quantity)
    {
        return CartItem::where('id', $id)
            ->update(['product_id' => $product_id, 'quantity' => $quantity]);
    }

    public function find(int $id)
    {
        return CartItem::findOrFail($id);
    }

    public function deleteAllId(int $id)
    {
        return CartItem::where('cart_id', $id)->delete();
    }

    public function getAll()
    {
        return CartItem::all();
    }

    public function groupBy(int $id)
    {
        return CartItem::selectRaw('cart_id,sum(price) as total')->groupBy('cart_id')->having('cart_id', '=', $id)->get();
    }

}
