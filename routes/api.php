<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CallController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CallCandidateController;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::group([
    'middleware' => ['auth:sanctum']
], function () {
    Route::post('logout', [AuthController::class, 'logout']);

    Route::get('me', [UserController::class, 'me']);
});

Route::post('call', [CallController::class, 'store']);
Route::get('call/{call}', [CallController::class, 'show']);
Route::post('call/{call}/join', [CallController::class, 'join']);

Route::post('call/{call}/candidate', [CallCandidateController::class, 'store']);
