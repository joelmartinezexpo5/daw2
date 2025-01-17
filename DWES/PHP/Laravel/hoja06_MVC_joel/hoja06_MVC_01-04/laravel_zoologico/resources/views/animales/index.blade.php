@extends('layouts.plantilla')
    @section('titulo', 'Index')
    @section('contenido')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Listado de Animales</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($animales as $index => $animal)
                <div class="border rounded-lg shadow p-4">
                    <h2 class="text-xl font-semibold">{{ $animal['especie'] }}</h2>
                    <img src="{{ asset('assets/imagenes/' . $animal['imagen']) }}" alt="{{ $animal['especie'] }}" class="w-full h-48 object-cover rounded">
                    <p>{{ $animal['descripcion'] }}</p>
                    <a href="{{ route('animales.show', $index) }}" class="text-blue-500 hover:underline">Ver detalles</a>
                </div>
            @endforeach
        </div>
    </div>

    @endsection
