<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Models\Cart_Item;


class CartRepository
{
    function create()
    {
        $create = Cart::create();

    }

}
