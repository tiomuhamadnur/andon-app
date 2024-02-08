<?php

use App\Http\Controllers\Api\ButtonController;
use App\Http\Controllers\Api\GetDataController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\UserController;
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

Route::controller(UserController::class)->group(function () {
    Route::post('login', 'loginUser');
});


Route::middleware('auth:api')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('auth-user', 'getAuthUser');
        Route::get('logout', 'userLogout');
    });

    Route::controller(TransactionController::class)->group(function () {
        Route::get('transactions', 'transactions');
        Route::post('transaction', 'transaction');

        Route::post('transaction/response', 'response');
        Route::post('transaction/closed', 'closed');

        Route::post('transaction/filter', 'filter');
        Route::post('transaction/search', 'ticketNumber');
    });

    Route::controller(GetDataController::class)->group(function () {
        Route::get('app', 'app');

        Route::post('equipments', 'equipments');
        Route::post('equipment', 'equipment');
        Route::get('parameters', 'parameters');
    });
});

Route::controller(TransactionController::class)->group(function () {
    Route::post('transaction/call', 'call');
    Route::get('transaction/check-initial', 'check_initial');
});

Route::controller(ButtonController::class)->group(function () {
    Route::post('button/register', 'register');
    Route::get('button', 'button');
});