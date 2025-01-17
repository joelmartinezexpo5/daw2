@extends('layouts.plantilla')
    {{-- @section('titulo', 'Zoologico-Mostrar el animal'.$animal) --}}
    @section('contenido')
    <div class="flex">
        <div class="w-1/2 p-4">
            <img src="{{ asset('images/' . $animal['imagen']) }}" alt="{{ $animal['especie'] }}" class="w-full h-auto rounded">
        </div>
        <div class="w-1/2 p-4">
            <h1 class="text-4xl font-bold">{{ $animal['especie'] }}</h1>
            <p><strong>Peso:</strong> {{ $animal['peso'] }} kg</p>
            <p><strong>Altura:</strong> {{ $animal['altura'] }} cm</p>
            <p><strong>Fecha de Nacimiento:</strong> {{ $animal['fechaNacimiento'] }}</p>
            <p><strong>Alimentación:</strong> {{ $animal['alimentacion'] }}</p>
            <p class="mt-4">{{ $animal['descripcion'] }}</p>
            <div class="mt-6">
                <a href="{{ route('animales.edit', 0) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Editar</a>
                <a href="{{ route('animales.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded ml-4">Volver</a>
            </div>
        </div>
    </div>

    @endsection

