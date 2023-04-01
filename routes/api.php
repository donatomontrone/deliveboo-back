<?php

use App\Http\Controllers\Api\LeadController as LeadController;
use App\Http\Controllers\Api\RestaurantController as RestaurantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OrderController;

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

Route::apiResource('restaurants', RestaurantController::class, ['only' => ['index', 'show']]);
Route::post('orders', [OrderController::class, 'store']);
Route::post('/payment', [LeadController::class, 'store' ]);