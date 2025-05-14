<?php

use App\Http\Controllers\ProductoController;

Route::get('/', [ProductoController::class, 'index'])->name('inicio');
// Route::get('dashboard', [ProductoController::class, 'index'])->name('inicio');
Route::resource('productos', ProductoController::class);

// Agrupar las rutas protegidas
Route::middleware(['auth'])->group(function () {
    Route::post('productos/{producto}/agregar', [ProductoController::class, 'agregarACesta'])->name('productos.agregar');
});

// require __DIR__.'/auth.php';

