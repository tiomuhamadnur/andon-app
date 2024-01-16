<?php

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
        Route::post('transaction/search/id', 'id');
        Route::post('transaction/search/ticket-number', 'ticketNumber');

        Route::get('transactions', 'transactions');
        Route::post('transactions/filter', 'filter');

        Route::get('transactions/parameters', 'parameters');
    });
});

Route::controller(TransactionController::class)->group(function () {
    Route::get('transaction/call', 'call');
    Route::get('transaction/check', 'check');
    Route::get('check-initial', 'check_initial');

    Route::get('cek-kirim-event', 'testEvent');
});