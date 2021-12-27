<?php

namespace App\Http\Controllers;

use App\Services\CartItemService;
use App\Services\CartService;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    private CartService $service;
    private CartItemService $cartItemService;

    public function __construct(CartService $cartService, CartItemService $cartItemService)
    {
        $this->service = $cartService;
        $this->cartItemService = $cartItemService;
    }

    public function cartList(): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->service->getAll();
    }


    public function submit(int $id): float|int
    {
        $price = $this->service->calculate($id);
        $this->service->updatePrice($id, $price);
        return $price;
    }

    public function removeCart(int $id): string
    {
        $this->service->delete($id);
        return "success";
    }

    public function createCart(): \App\Models\Cart
    {
        return $this->service->createCart();
    }

    public function viewACart($id): \Illuminate\Database\Eloquent\Collection
    {
        return $this->cartItemService->findCartId($id);
    }

}
