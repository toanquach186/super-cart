<?php
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\AuthController;
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

Route::get('token', function (Request $request) {
    $token = $request->session()->token();
    //$token = csrf_token();
    return Response()->json(array("token"=>$token));
});
Route::post('/users/login', [AuthController::class, 'onLogin'])->name('user.login');
Route::post('/users', [AuthController::class, 'onRegister'])->name('user.register');
Route::post('/users/logout', [AuthController::class, 'logout'])->name('user.register');

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('user-info', 'UserController@getUserInfo');
    Route::get('view-all-cart/{id}', [UserController::class,'viewAllCart'])->name('.user.viewAllCart');

    Route::get('cart-all-item', [CartItemController::class, 'index'])->name('cart.list');
    Route::post('add-to-cart/{idCart}/{idProduct}/{quantity}', [CartItemController::class, 'addToCart'])->name('cart.add');
    Route::put('update-cart/{id}/{product_id}/{quantity}', [CartItemController::class, 'edit'])->name('cart.update');
    Route::delete('delete-from-cart/{idCart}/{id}',[CartItemController::class, 'destroy'])->name('cart.del');

    Route::delete('delete-cart/{id}', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::get('view-cart', [CartController::class, 'cartList'])->name('cart.view');
    Route::Post('viewPrice/{id}', [CartController::class, 'submit'])->name('cart.viewP');
    Route::get('view-a-cart/{id}', [CartController::class, 'viewACart'])->name('cart.view1');
    Route::post('/add-cart', [CartController::class, 'createCart'])->name('products.add');

});

Route::post('/add-cart-ses', [CartController::class, 'checkSession'])->name('products.add');




