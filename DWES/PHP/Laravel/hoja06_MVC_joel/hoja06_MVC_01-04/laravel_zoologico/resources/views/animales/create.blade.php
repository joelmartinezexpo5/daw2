@extends('layouts.plantilla')
    @section('titulo', 'Create')
    @section('contenido')
    <form action="{{ route('animales.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="especie">Especie:</label>
        <input type="text" id="especie" name="especie" class="border rounded p-2 w-full">
        @error('especie')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br>

        <label for="peso">Peso:</label>
        <input type="number" id="peso" name="peso" class="border rounded p-2 w-full">
        @error('peso')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br>

        <label for="altura">Altura:</label>
        <input type="number" id="altura" name="altura" class="border rounded p-2 w-full">
        @error('altura')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br>

        <label for="fechaNacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fechaNacimiento" name="fechaNacimiento" class="border rounded p-2 w-full">
        @error('fechaNacimiento')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br>

        <label for="alimentacion">Alimentación:</label>
        <input type="text" id="alimentacion" name="alimentacion" class="border rounded p-2 w-full">

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" class="border rounded p-2 w-full"></textarea>

        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen">
        @error('imagen')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded mt-4">Añadir animal</button>
    </form>
    @endsection

