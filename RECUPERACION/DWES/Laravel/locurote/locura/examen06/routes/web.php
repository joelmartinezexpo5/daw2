<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::get('/dashboard', function () {
    return redirect('/productos');
})->name('dashboard');

Route::get('/', function () {
    return redirect()->route('productos.index');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('productos', ProductoController::class);
});

// require __DIR__.'/auth.php';
