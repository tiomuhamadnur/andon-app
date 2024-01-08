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
});

Route::controller(TransactionController::class)->group(function () {
    Route::get('transaction/check', 'check')->name('api.transaction.check');
    Route::get('transaction/call', 'call')->name('api.transaction.call');
    Route::get('transaction/response', 'response')->name('api.transaction.response');
    Route::get('transaction/closed', 'closed')->name('api.transaction.closed');

});