<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;


class CartController extends Controller
{
    private CartService $service;

    public function __construct(CartService $cartService)
    {
        $this->service = $cartService;
    }

    public function cartList()
    {
        $cartItems = Product::all();
        // dd($cartItems);
        return $cartItems;
    }


    public function addToCart(Request $request)
    {

    }

    public function updateCart(Request $request)
    {

    }

    public function removeCart(Request $request)
    {


        $success = "success";
        return $success;
    }

    public function clearAllCart()
    {

        Product::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        $success = "success";
        return $success;
    }
    public function createCart(){
        return $this->service->createCart();
    }

}
