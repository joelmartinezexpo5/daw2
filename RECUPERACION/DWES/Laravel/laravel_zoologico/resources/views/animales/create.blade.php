@extends('layouts.plantilla')

@section('contenido')
    <h1 class="text-2xl font-bold mb-4">Añadir nuevo animal</h1>

    <form class="space-y-4" method="POST" action="#">
        @csrf
        <input type="text" name="especie" placeholder="Especie" class="w-full border p-2 rounded">
        <input type="number" name="peso" placeholder="Peso (kg)" class="w-full border p-2 rounded">
        <input type="number" name="altura" placeholder="Altura (cm)" class="w-full border p-2 rounded">
        <input type="date" name="fechaNacimiento" class="w-full border p-2 rounded">
        <input type="text" name="alimentacion" placeholder="Alimentación" class="w-full border p-2 rounded">
        <input type="text" name="imagen" placeholder="Nombre de imagen" class="w-full border p-2 rounded">
        <textarea name="descripcion" placeholder="Descripción" class="w-full border p-2 rounded"></textarea>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Añadir animal</button>
    </form>
@endsection
