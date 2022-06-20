<?php

use App\Http\Controllers\Api\AlamatController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CheckoutController;
use App\Http\Controllers\Api\KeranjangController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::get('/product', [ProductController::class, 'product']);

Route::get('/kategori', [ProductController::class, 'categories']);

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    Route::get('/alamat', [AlamatController::class, 'alamat']);

    Route::post('/alamat', [AlamatController::class, 'create']);

    Route::post('/alamat/{id}', [AlamatController::class, 'update']);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('keranjang/{id}', [KeranjangController::class, 'get']);

    Route::post('keranjang/{id}', [KeranjangController::class, 'post']);

    Route::get('keranjang/{id}/tambah', [KeranjangController::class, 'tambah']);

    Route::get('keranjang/{id}/kurang', [KeranjangController::class, 'kurang']);

    Route::delete('keranjang/{id}', [KeranjangController::class, 'delete']);

    Route::get('order/{id}', [OrderController::class, 'get']);

    Route::post('order/{id}', [OrderController::class, 'post']);

    Route::get('checkout/{id]', [CheckoutController::class, 'get']);
});
