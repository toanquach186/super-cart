<?php

namespace App\Http\Controllers;

use App\Services\CartItemService;
use App\Services\CartService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    private CartItemService $cartItemService;
    private ProductService $productService;
    private CartService $cartService;

    public function __construct(CartItemService $cartItemService, CartService $cartService, ProductService $productService)
    {
        $this->cartItemService = $cartItemService;
        $this->cartService = $cartService;
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->cartItemService->getAll();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart($idCart, $idProduct, $quantity)
    {
        $product = $this->productService->find($idProduct);
        $cart = $this->cartService->find($idCart);
        if ($cart != null) {
            return $this->cartItemService->addCart($cart->id, $product, $quantity);
        } else {
            $this->cartService->createCart();
            $cart2 = $this->cartService->find($idCart);
            return $this->cartItemService->addCart($cart2->id, $product, $quantity);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id, int $product_id, int $quantity): \Illuminate\Http\Response|string
    {
        $cartItem = $this->cartItemService->findCartItemId($id);
        $this->cartItemService->editCart($cartItem->id, $product_id, $quantity);
        return response()->json([
            'product_id' => $product_id,
            'quantity' => $quantity
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $cartItem= $this->cartItemService->delete($id);
    }
}
