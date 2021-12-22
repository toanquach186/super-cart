<?php
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Cart_ItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/', [ProductController::class, 'productList'])->name('products.list');
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('add-to-cart/{idCart}/{idProduct}/{quantity}', [Cart_ItemController::class, 'create'])->name('cart.add');
Route::post('add-cart', [CartController::class, 'createCart'])->name('cart.add');
Route::put('update-cart/{id}/{product_id}/{quantity}', [Cart_ItemController::class, 'edit'])->name('cart.update');
Route::delete('remove/{id}', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');


