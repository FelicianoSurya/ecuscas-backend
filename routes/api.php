<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderProductController;

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

Route::group(['prefix' => 'v1'],function(){
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    // Store
    Route::post('createCategory',[KategoriController::class, 'store']);
    Route::post('createProduct', [ProductController::class, 'storeProduct']);
    Route::post('createOrderDetail', [OrderDetailController::class, 'storeOrderDetail']);
    Route::post('createOrderProduct', [OrderProductController::class, 'store']);
    Route::post('getDetailBarangHistory',[HomeController::class, 'getDetailBarang']);
    Route::post('createOrder',[OrderController::class, 'storeOrder']);

    // GetData
    Route::get('getCategory',[HomeController::class, 'getCategory']);
    Route::get('getVoucher', [HomeController::class, 'getVoucher']);
    Route::get('getPembayaran', [HomeController::class, 'getPembayaran']);
    Route::get('getProduct', [HomeController::class, 'getProduct']);
    Route::get('getOngkir', [HomeController::class, 'getOngkir']);
    Route::get('getOrderDetail/{iduser}', [OrderDetailController::class, 'getOrderDetail']);
    Route::get('getJenisBarang',[HomeController::class, 'getJenisBarang']);
    Route::get('getOrderBarang/{iduser}',[OrderProductController::class, 'getData']);
    Route::get('getOrder/{iduser}',[OrderController::class, 'getData']);

    //Delete
    Route::post('cancelDetailBarang', [OrderDetailController::class, 'deleteDetailBarang']);

    //Update
    Route::post('updateDetailBarang', [OrderDetailController::class, 'updateDetailBarang']);
});
