<?php

use App\Http\Controllers\AlamatTokoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\SettingTokoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', DashboardController::class);

Route::resource('/category', CategoryController::class);

Route::resource('/product', ProductController::class);

Route::resource('/settingtoko', SettingTokoController::class);

Route::resource('/alamat_toko', AlamatTokoController::class);

Route::resource('/rekening', RekeningController::class);

Route::resource('/kecamatan', KecamatanController::class);

Route::resource('/kabupaten', KabupatenController::class);

Route::resource('/user', UserController::class);
