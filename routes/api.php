<?php

use App\Http\Middleware\VerifyAccessToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', function () {
        return response()->json(['message' => 'Please Login [POST] /api/auth/login'], 401);
    })->name('login');
    Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);
    Route::post('/register', [App\Http\Controllers\Api\AuthController::class, 'register'])->name('register');

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout'])->name('logout');
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
    });
});

Route::middleware([VerifyAccessToken::class])->group(function () {
    Route::post('short-link', [App\Http\Controllers\Api\ShortLinkController::class, 'store']);
});
