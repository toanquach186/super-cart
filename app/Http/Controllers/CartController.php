<?php

namespace App\Http\Controllers;

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

    public function cartList(): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->service->getAll();
    }


    public function submit(int $id): float|int
    {
        return $this->service->calculatePrice($id);
    }

    public function removeCart(int $id): string
    {
        $this->service->delete($id);
        return response()->json([
            'deleted cart-item-id'=>$id
        ]);
    }

    public function createCart(): array
    {
        return $this->service->createCart();
    }

    public function viewACart($id): array
    {
        return $this->cartItemService->findCartId($id);
    }

    /**
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function checkSession()
    {
        //$request->session()->push('new',$request->id);
        return session()->all();
    }
}
