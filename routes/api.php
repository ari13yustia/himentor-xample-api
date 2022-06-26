<?php

use App\Http\Controllers\ApiController\OrderController;
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
Route::get('order', [OrderController::class,'index']);
Route::post('order/store', [OrderController::class,'store']);
Route::get('order/show/{id}', [OrderController::class,'show']);
Route::post('order/update/{id}', [OrderController::class,'update']);
Route::post('order/delete/{id}', [OrderController::class,'destroy']);
// Route::resource('order', OrderController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
