<?php
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;

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

Route::get('cart-all-item', [CartItemController::class, 'index'])->name('cart.list');
Route::post('add-to-cart/{idCart}/{idProduct}/{quantity}', [CartItemController::class, 'addToCart'])->name('cart.add');
Route::put('update-cart/{id}/{product_id}/{quantity}', [CartItemController::class, 'edit'])->name('cart.update');
Route::delete('delete-from-cart/{id}/{idCart}',[CartItemController::class, 'destroy'])->name('cart.del');

Route::delete('delete-cart/{id}', [CartController::class, 'removeCart'])->name('cart.remove');
Route::get('view-cart', [CartController::class, 'cartList'])->name('cart.view');
Route::Post('viewPrice/{id}', [CartController::class, 'submit'])->name('cart.viewP');
Route::get('view-a-cart/{id}', [CartController::class, 'viewACart'])->name('cart.view1');

Route::get('who', [UserController::class, 'check'])->name('cart.check')->middleware('auth');

Route::get('token', function (Request $request) {
    $token = $request->session()->token();
    $token = csrf_token();
    return Response()->json(array("token"=>$token));
});
Route::post('/users/login', [UserController::class, 'onLogin'])->name('user.login');
Route::post('/users', [UserController::class, 'onRegister'])->name('user.register');

Route::get('checks', function (){
    return \Illuminate\Support\Facades\Auth::check();
});






