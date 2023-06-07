<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\V1\ListUserController;
use \App\Http\Controllers\Api\V1\KendaraanController;
use \App\Http\Controllers\Api\V1\PenjualanController;
use \App\Http\Controllers\Auth\LoginController;
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
Route::post('login', [LoginController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('user/list', [ListUserController::class, 'get']);


    Route::get('kendaraan/cek-stok', [KendaraanController::class, 'get']);
    Route::get('penjualan', [PenjualanController::class, 'get']);
    Route::get('penjualan/per-kendaraan', [PenjualanController::class, 'getPerKendaraan']);

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
