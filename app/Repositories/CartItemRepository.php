<?php

namespace App\Repositories;

use App\Models\CartItem;
use Illuminate\Database\Eloquent\Collection;


class CartItemRepository
{
    function add($idCart, $product, $quantity):CartItem
    {
        return CartItem::create([
            'cart_id' => $idCart,
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

    public function findCartItemId(int $id):array
    {
        return CartItem::find($id)->toarray();
    }

    public function findCartId($id):array
    {
        return CartItem::where('cart_id', $id)->get()->toArray();
    }

    public function deleteAllItemId(int $id): bool
    {
        return CartItem::where('cart_id', $id)->delete();
    }

    public function delete(int $id): bool
    {
        return CartItem::where('id', $id)->delete();
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection|array
    {
        return CartItem::all();
    }

}
