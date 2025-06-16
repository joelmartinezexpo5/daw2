<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebRestServiceController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('productos', [ProductoController::class, 'index']);
Route::middleware('auth:sanctum')->group(function(){
    Route::post('productos',[ProductoController::class,'store']);
    Route::post('productos/{producto}',[ProductoController::class,'update']);
    Route::delete('productos/{producto}',[ProductoController::class,'destroy']);
});
Route::get('productos/{producto}', [ProductoController::class, 'show']);
Route::post('/login',LoginController::class);