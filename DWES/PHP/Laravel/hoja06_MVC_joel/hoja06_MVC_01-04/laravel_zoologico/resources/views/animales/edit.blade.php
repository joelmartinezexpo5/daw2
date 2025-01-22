@extends('layouts.plantilla')
    {{-- @section('titulo', 'Zoologico-Editar el animal'.$animal) --}}
    @section('contenido')
    <form action="{{route('animales.update', $animal)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <label for="especie">Especie:</label>
        <input type="text" id="especie" name="especie" value="{{ $animal->especie }}" class="border rounded p-2 w-full">
        @error('especie')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br>

        <label for="peso">Peso:</label>
        <input type="number" id="peso" name="peso" value="{{ $animal->peso }}" class="border rounded p-2 w-full">
        @error('peso')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br>

        <label for="altura">Altura:</label>
        <input type="number" id="altura" name="altura" value="{{ $animal->altura }}" class="border rounded p-2 w-full">
        @error('altura')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br>

        <label for="fechaNacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="{{ $animal->fechaNacimiento }}" class="border rounded p-2 w-full">
        @error('fechaNacimiento')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br>

        <label for="alimentacion">Alimentación:</label>
        <input type="text" id="alimentacion" name="alimentacion" value="{{ $animal->alimentacion }}" class="border rounded p-2 w-full">

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" class="border rounded p-2 w-full">{{ $animal->descripcion }}</textarea>

        <label for="imagen">Imagen:</label>
        @if ($animal->imagen)
            <div>
                <img src="{{ asset('assets/imagenes/' . $animal->imagen) }}" alt="{{ $animal->especie }}" width="100">
            </div>
        @endif
        <input type="file" name="imagen">
        @error('imagen')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Modificar animal</button>
    </form>

    @endsection
