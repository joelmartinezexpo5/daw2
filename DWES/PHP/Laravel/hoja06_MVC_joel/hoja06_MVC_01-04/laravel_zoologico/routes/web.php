<?php

use App\Http\Controllers\InicioController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\RevisionesController;
use Illuminate\Support\Facades\Route;

Route::get('/', InicioController::class)->name('inicio');

Route::get('animales', [AnimalController::class,'index'])->name('animales.index');

Route::get('/animales/crear', [AnimalController::class,'create'])->name('animales.create')->middleware('auth');
//Hay que poner la ruta anterior delante de esta, ya que en caso de estar despues interpretaría que el mensaje a sacar es
//Vista en detalle del animal crear
Route::get('/animales/{animal}', [AnimalController::class,'show'])->name('animales.show');

Route::get('/animales/{animal}/editar', [AnimalController::Class,'edit'])->name('animales.edit')->middleware('auth');

Route::post('animales', [AnimalController::class, 'store'])->name(('animales.store'));

Route::put('/animales/{animal}', [AnimalController::class, 'update'])->name('animales.update');

Route::get('/revisiones/{animal}/crear', [RevisionesController::class, 'create'])->name('revisiones.create');

Route::post('/revisiones/{animal}', [RevisionesController::class, 'store'])->name('revisiones.store');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
