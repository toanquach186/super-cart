<?php

namespace App\Repositories;

use App\Models\CartItem;

class CartItemRepository
{
    function add($cart_id, $product_id, $quantity, $price)
    {
        $create = CartItem::create([
            'cart_id' => $cart_id,
            'product_id' => $product_id,
            'quantity' => $quantity,
            'price' => $price
        ]);
    }
    function edit($id, $product_id, $quantity){
        $edit = CartItem::where('id', $id)->update(['product_id'=> $product_id, 'quantity'=>$quantity]);
    }

}
