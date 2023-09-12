<?php

use App\Http\Controllers\API\v1\AuthController;
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

Route::post('login', [AuthController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'destroy']);

    Route::prefix('v1')->group(function () {
        Route::apiResource('tickets', TicketController::class);
    });
});
