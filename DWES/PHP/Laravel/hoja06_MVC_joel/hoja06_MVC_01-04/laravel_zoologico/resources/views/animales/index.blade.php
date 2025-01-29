@extends('layouts.plantilla')
    @section('titulo', 'Index')
    @section('contenido')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Listado de Animales</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($animales as $index => $animal)
                <div  class="border rounded-lg shadow p-4" >
                    <h2 class="text-xl font-semibold">{{ $animal['especie'] }}</h2>
                    <img src="{{ asset('assets/imagenes/' . $animal->imagen) }}" alt="{{ $animal->imagen }}" class="w-full h-48 object-cover rounded" style="width: 100%; height: 300px; object-fit: cover;">
                    <p>{{ Str::limit($animal->descripcion, 100) }}</p>
                    <p>Número de revisiones: {{ $animal->revisiones()->count() }}</p>
                    <a href="{{ route('animales.show', $animal) }}" class="text-blue-500 hover:underline">Ver detalles</a>
                </div>
            @endforeach
        </div>
    </div>

    @endsection
