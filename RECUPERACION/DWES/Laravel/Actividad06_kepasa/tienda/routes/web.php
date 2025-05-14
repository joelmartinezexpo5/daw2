<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CestaController;


Route::get('/', [ProductoController::class, 'index'])->name('inicio');
// Route::get('dashboard', [ProductoController::class, 'index'])->name('inicio');
Route::resource('productos', ProductoController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/cesta', [CestaController::class, 'index'])->name('cesta.index');
    Route::post('/productos/{producto}/agregar', [CestaController::class, 'agregar'])->name('productos.agregar');
    Route::delete('/cesta/{id}', [CestaController::class, 'eliminar'])->name('cesta.eliminar');
    Route::post('/cesta/vaciar', [CestaController::class, 'vaciar'])->name('cesta.vaciar');
});

// require __DIR__.'/auth.php';

