<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\ServerChannelController;
use App\Http\Controllers\ServerCategoryController;
use App\Http\Controllers\Server\ServerChannelMemberController;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::group([
    'middleware' => ['auth:sanctum']
], function () {
    Route::post('logout', [AuthController::class, 'logout']);

    Route::get('me', [UserController::class, 'me']);

    Route::prefix('server')->group(function () {
        Route::get('', [ServerController::class, 'index']);
        Route::post('', [ServerController::class, 'store']);
        Route::get('{server}', [ServerController::class, 'show']);
        Route::put('{server}', [ServerController::class, 'update']);
    });

    Route::prefix('server-category')->group(function () {
        Route::post('', [ServerCategoryController::class, 'store']);
    });

    Route::prefix('server-channel')->group(function () {
        Route::post('', [ServerChannelController::class, 'store']);
        Route::get('{channel}', [ServerChannelController::class, 'show']);
    });

    Route::prefix('server-channel-member')->group(function () {
        Route::get('', [ServerChannelMemberController::class, 'index']);
        Route::post('', [ServerChannelMemberController::class, 'connect']);
        Route::patch('{member}', [ServerChannelMemberController::class, 'update']);
        Route::delete('{member}', [ServerChannelMemberController::class, 'destroy']);
    });
});
