@extends('layouts.plantilla')
    @section('titulo', 'Create')
    @section('contenido')
    <form action="{{route('animales.store')}}">
        <label for="especie">Especie:</label>
        <input type="text" id="especie" name="especie" class="border rounded p-2 w-full">

        <label for="peso">Peso:</label>
        <input type="number" id="peso" name="peso" class="border rounded p-2 w-full">

        <label for="altura">Altura:</label>
        <input type="number" id="altura" name="altura" class="border rounded p-2 w-full">

        <label for="fechaNacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fechaNacimiento" name="fechaNacimiento" class="border rounded p-2 w-full">

        <label for="alimentacion">Alimentación:</label>
        <input type="text" id="alimentacion" name="alimentacion" class="border rounded p-2 w-full">

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" class="border rounded p-2 w-full"></textarea>

        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen">

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded mt-4">Añadir animal</button>
    </form>

    @endsection
