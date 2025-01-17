@extends('layouts.plantilla')
    {{-- @section('titulo', 'Zoologico-Editar el animal'.$animal) --}}
    @section('contenido')
    <form action="#" method="POST" enctype="multipart/form-data">
        <label for="especie">Especie:</label>
        <input type="text" id="especie" name="especie" value="{{ $animal['especie'] }}" class="border rounded p-2 w-full">

        <label for="peso">Peso:</label>
        <input type="number" id="peso" name="peso" value="{{ $animal['peso'] }}" class="border rounded p-2 w-full">

        <label for="altura">Altura:</label>
        <input type="number" id="altura" name="altura" value="{{ $animal['altura'] }}" class="border rounded p-2 w-full">

        <label for="fechaNacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="{{ $animal['fechaNacimiento'] }}" class="border rounded p-2 w-full">

        <label for="alimentacion">Alimentación:</label>
        <input type="text" id="alimentacion" name="alimentacion" value="{{ $animal['alimentacion'] }}" class="border rounded p-2 w-full">

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" class="border rounded p-2 w-full">{{ $animal['descripcion'] }}</textarea>

        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen">

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Modificar animal</button>
    </form>

    @endsection
