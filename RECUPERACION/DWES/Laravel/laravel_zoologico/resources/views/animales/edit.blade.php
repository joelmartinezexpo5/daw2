@extends('layouts.plantilla')

@section('contenido')
    <h1 class="text-2xl font-bold mb-4">Modificar animal</h1>

    <form class="space-y-4" method="POST" action="#">
        @csrf
        <input type="text" name="especie" value="{{ $animal['especie'] }}" class="w-full border p-2 rounded">
        <input type="number" name="peso" value="{{ $animal['peso'] }}" class="w-full border p-2 rounded">
        <input type="number" name="altura" value="{{ $animal['altura'] }}" class="w-full border p-2 rounded">
        <input type="date" name="fechaNacimiento" value="{{ $animal['fechaNacimiento'] }}" class="w-full border p-2 rounded">
        <input type="text" name="alimentacion" value="{{ $animal['alimentacion'] }}" class="w-full border p-2 rounded">
        <input type="text" name="imagen" value="{{ $animal['imagen'] }}" class="w-full border p-2 rounded">
        <textarea name="descripcion" class="w-full border p-2 rounded">{{ $animal['descripcion'] }}</textarea>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Modificar animal</button>
    </form>
@endsection
