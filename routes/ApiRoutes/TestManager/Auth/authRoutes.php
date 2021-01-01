<?php


use App\Http\Controllers\Api\TestManager\Auth\AuthController;

Route::put('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('refresh', [AuthController::class, 'refresh']);
Route::post('me', [AuthController::class, 'me']);
Route::post('register', [AuthController::class, 'register']);
