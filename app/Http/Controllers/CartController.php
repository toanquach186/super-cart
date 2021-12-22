<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CartItemService;
use App\Services\CartService;
use Illuminate\Http\Request;


class CartController extends Controller
{
    private CartService $service;
    private CartItemService $cartItemService;

    public function __construct(CartService $cartService, CartItemService $cartItemService)
    {
        $this->service = $cartService;
        $this->cartItemService = $cartItemService;
    }

    public function cartList()
    {
       return $this->service->getAll();
    }

    public function viewPrice(int $id)
    {
        return $this->cartItemService->groupBy($id);

    }

    public function removeCart(int $id): string
    {
        $this->cartItemService->deleteAllId($id);
        $this->service->delete($id);
        return "success";
    }

    public function createCart()
    {
        return $this->service->createCart();
    }

}
