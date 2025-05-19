<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CestaController;


// Página principal (lista de productos)
Route::get('/', [ProductoController::class, 'index'])->name('inicio');

// Listar productos
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');

// Mostrar formulario de creación
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');

// Guardar nuevo producto
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');

// Mostrar un producto específico
Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');

// Mostrar formulario de edición
Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');

// Actualizar un producto
Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');

// Eliminar un producto
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');

// Ruta para añadir a la cesta (protegida con auth y rol)
Route::middleware(['auth'])->group(function () {
    Route::post('/productos/{producto}/agregar', [ProductoController::class, 'agregarACesta'])->name('productos.agregar');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/cesta', [CestaController::class, 'index'])->name('cesta.index');
    Route::post('/productos/{producto}/agregar', [CestaController::class, 'agregar'])->name('productos.agregar');
    Route::delete('/cesta/{id}', [CestaController::class, 'eliminar'])->name('cesta.eliminar');
    Route::post('/cesta/vaciar', [CestaController::class, 'vaciar'])->name('cesta.vaciar');
});

// require __DIR__.'/auth.php';

