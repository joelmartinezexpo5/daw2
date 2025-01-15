<?php

use App\Http\Controllers\InicioController;
use App\Http\Controllers\AnimalController;
use Illuminate\Support\Facades\Route;

Route::get('/', InicioController::class)->name('inicio');

Route::get('animales', [AnimalController::class,'index'])->name('animales.index');

Route::get('/animales/crear ', [AnimalController::class,'create'])->name('animales.create');
//Hay que poner la ruta anterior delante de esta, ya que en caso de estar despues interpretaría que el mensaje a sacar es
//Vista en detalle del animal crear
Route::get('/animales/{animal} ', [AnimalController::class,'show'])->name('animales.show');

Route::get('/animales/{animal}/editar ', [AnimalController::Class,'edit'])->name('animales.edit');
