<?php

namespace App\Http\Controllers;

use App\Services\CartItemService;

class CartItemController extends Controller
{
    private CartItemService $cartItemService;


    public function __construct(CartItemService $cartItemService)
    {
        $this->cartItemService = $cartItemService;

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

    public function addToCart($idCart, $idProduct, $quantity): \App\Models\CartItem
    {
        return $this->cartItemService->addCart($idCart, $idProduct, $quantity);
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
    public function destroy(int $id, $idCart): \Illuminate\Http\JsonResponse
    {
        $this->cartItemService->delete($id,$idCart);
        return response()->json([
            'deleted cart-item-id'=>$id
        ]);
    }
}
