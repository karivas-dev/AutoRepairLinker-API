<?php

use App\Http\Controllers\API\v1\AuthController;
use App\Http\Controllers\API\v1\BrandController;
use App\Http\Controllers\API\v1\CarController;
use App\Http\Controllers\API\v1\GarageController;
use App\Http\Controllers\API\v1\ModelController;
use App\Http\Controllers\API\v1\OwnerController;
use App\Http\Controllers\API\v1\StoreController;
use App\Http\Controllers\API\v1\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'store'])->name('login');
Route::post('logout', [AuthController::class, 'destroy'])->middleware('auth:sanctum')->name('logout');

Route::get('ziggy', fn() => response()->json(new \Tightenco\Ziggy\Ziggy()));

Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    Route::apiResource('garages', GarageController::class);
    Route::apiResource('tickets', TicketController::class);
    Route::apiResource('brands', BrandController::class);
    Route::apiResource('stores', StoreController::class);
    Route::apiResource('owners', OwnerController::class);
    Route::apiResource('models', ModelController::class)->except(['index']);
    Route::get('models/brand/{brand}', [ModelController::class, 'index'])->name('models.index');
    Route::apiResource('cars', CarController::class);
});
