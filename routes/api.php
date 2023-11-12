<?php

use App\Http\Controllers\API\v1\AuthController;
use App\Http\Controllers\API\v1\BidController;
use App\Http\Controllers\API\v1\BranchController;
use App\Http\Controllers\API\v1\BrandController;
use App\Http\Controllers\API\v1\CarController;
use App\Http\Controllers\API\v1\GarageController;
use App\Http\Controllers\API\v1\InventoryController;
use App\Http\Controllers\API\v1\ModelController;
use App\Http\Controllers\API\v1\OwnerController;
use App\Http\Controllers\API\v1\ReplacementController;
use App\Http\Controllers\API\v1\StoreController;
use App\Http\Controllers\API\v1\TicketController;
use App\Models\BidStatus;
use App\Models\TicketStatus;
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
Route::post('login/google', [AuthController::class, 'google'])->name('login.google');

Route::get('ziggy', fn() => response()->json(new \Tightenco\Ziggy\Ziggy()));

Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    Route::get('login/checker', [AuthController::class, 'loginChecker'])->name('login.checker');
    Route::post('link/google', [AuthController::class, 'linkGoogle'])->name('link.google');
    Route::post('logout', [AuthController::class, 'destroy'])->name('logout');

    Route::apiResource('garages', GarageController::class);
    Route::apiResource('tickets', TicketController::class);
    Route::apiResource('brands', BrandController::class);
    Route::apiResource('stores', StoreController::class);
    Route::apiResource('owners', OwnerController::class);
    Route::apiResource('models', ModelController::class)->except(['index']);
    Route::get('models/brand/{brand}', [ModelController::class, 'index'])->name('models.index');
    Route::apiResource('cars', CarController::class);
    Route::apiResource('replacements', ReplacementController::class);
    Route::apiResource('branches', BranchController::class);
    Route::apiResource('bids', BidController::class)->except('index');
    Route::apiResource('inventories', InventoryController::class)->except('index');
});

Route::get('location', fn() => [
    'states' => \App\Models\State::all(),
    'towns' => \App\Models\Town::all(),
    'districts' => \App\Models\District::all()
])->name('location');

Route::get('ticket-statuses', fn() => ['ticket_statuses' => TicketStatus::all()])
    ->name('ticket.statuses');
Route::get('bid-statuses', fn() => ['bid_statuses' => BidStatus::all()])
    ->name('bid.statuses');
