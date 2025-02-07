<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\LoginController;

// Route::get('productos/{producto}', [ProductoController::class, 'show']);
Route::apiResource('productos', ProductoController::class);
Route::post('/login',LoginController::class);
Route::apiResource('productos', ProductoController::class)->except('store');
Route::middleware('auth:sanctum')->post('productos', [ProductoController::class, 'store']);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
