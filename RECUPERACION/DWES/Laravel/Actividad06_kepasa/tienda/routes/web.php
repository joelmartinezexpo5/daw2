<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CestaController;


// Página principal (lista de productos)
Route::get('/', [ProductoController::class, 'index'])->name('inicio');
// Listar productos
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');



Route::middleware(['auth', 'rol:administrador'])->group(function (){
    // Mostrar formulario de creación
    Route::get('/productos/crear', [ProductoController::class, 'create'])->name('productos.create');
    // Guardar nuevo producto
    Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
    // Mostrar formulario de edición
    Route::get('/productos/{producto}/editar', [ProductoController::class, 'edit'])->name('productos.edit');
    // Actualizar un producto
    Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
    // Eliminar un producto
    Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
});

// Mostrar un producto específico
Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');

Route::middleware(['auth', 'rol:cliente'])->group(function () {
    // Ver cesta
    Route::get('/cesta', [CestaController::class, 'index'])->name('cesta.index');
    // Añadir producto a cesta (ProductoController)
    Route::post('/productos/{producto}/agregar', [ProductoController::class, 'agregarACesta'])->name('productos.agregar');
    // Añadir producto a cesta (CestaController) — duplicado
    Route::post('/productos/{producto}/agregar', [CestaController::class, 'agregar'])->name('productos.agregar');
    // Eliminar producto de cesta
    Route::delete('/cesta/{id}', [CestaController::class, 'eliminar'])->name('cesta.eliminar');
    // Vaciar cesta
    Route::post('/cesta/vaciar', [CestaController::class, 'vaciar'])->name('cesta.vaciar');
});



