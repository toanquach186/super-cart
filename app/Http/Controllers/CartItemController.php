<?php

namespace App\Http\Controllers;

use App\Services\CartItemService;
use App\Services\CartService;

class CartItemController extends Controller
{
    private CartItemService $cartItemService;
    private CartService $cartService;


    public function __construct(CartItemService $cartItemService, CartService $cartService)
    {
        $this->cartItemService = $cartItemService;
        $this->cartService = $cartService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return array|\Illuminate\Database\Eloquent\Collection
     */
    public function index(): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->cartItemService->getAll();
    }

    public function addToCart($idProduct, $quantity): \App\Models\CartItem
    {
        $result = $this->cartItemService->addToCart($idProduct, $quantity);
        $this->cartService->calculatePrice();
        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(int $id, int $product_id, int $quantity): \Illuminate\Http\JsonResponse
    {
        $this->cartItemService->editCart($id, $product_id, $quantity);
        $this->cartService->calculatePrice();
        return response()->json([
            'product_id' => $product_id,
            'quantity' => $quantity
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        $this->cartItemService->delete($id);
        $this->cartService->calculatePrice();
        return response()->json([
            'deleted cart-item-id'=>$id
        ]);
    }
}
