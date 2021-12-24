<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Models\CartItem;
use phpDocumentor\Reflection\Types\Array_;

class CartItemRepository
{
    function add($cart, $product, $quantity):CartItem
    {
        return CartItem::create([
            'cart_id' => $cart['id'],
            'product_id' => $product['id'],
            'quantity' => $quantity,
            'price' => $product['price']
        ]);
    }

    function edit($id, $product_id, $quantity):bool
    {
        return CartItem::where('id', $id['id'])
            ->update(['product_id' => $product_id, 'quantity' => $quantity]);
    }

    public function findCartItemId(int $id):CartItem
    {
        return CartItem::find($id);
    }

    public function findCartId(int $id)
    {
        return CartItem::where('cart_id',$id)->get();
    }

    public function deleteAllId(int $id):CartItem
    {
        return CartItem::where('cart_id', $id)->delete();
    }

    public function delete(int $id)
    {
        return CartItem::where('id', $id)->delete();
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection|array
    {
        return CartItem::all();
    }

    public function groupBy(int $id)
    {
        return CartItem::selectRaw('cart_id,sum(price) as total')->groupBy('cart_id')->having('cart_id', '=', $id)->get();
    }

}
