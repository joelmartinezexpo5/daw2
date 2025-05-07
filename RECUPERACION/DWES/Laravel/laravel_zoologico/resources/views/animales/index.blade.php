@extends('layouts.plantilla')

@section('contenido')
    <h1 class="text-2xl font-bold mb-4">Listado de animales del zoológico</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($animales as $id => $animal)
            <div class="border rounded-lg shadow p-4 bg-white">
                <img src="{{ asset('assets/imagenes/' . $animal['imagen']) }}" alt="{{ $animal['especie'] }}" class="w-full h-48 object-cover rounded">
                <h2 class="text-xl font-semibold mt-2">{{ $animal['especie'] }}</h2>
                <p>Peso: {{ $animal['peso'] }} kg</p>
                <p>Altura: {{ $animal['altura'] }} cm</p>
                <a href="{{ url('animales/' . $id) }}" class="text-blue-600 hover:underline mt-2 inline-block">Ver detalles</a>
            </div>
        @endforeach
    </div>
@endsection
