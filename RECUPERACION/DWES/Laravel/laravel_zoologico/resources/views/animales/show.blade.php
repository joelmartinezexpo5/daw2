@extends('layouts.plantilla')

@section('contenido')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <img src="{{ asset('assets/imagenes/' . $animal['imagen']) }}" alt="{{ $animal['especie'] }}" class=" rounded shadow">
        </div>
        <div>
            <h2 class="text-3xl font-bold">{{ $animal['especie'] }}</h2>
            <p><strong>Peso:</strong> {{ $animal['peso'] }} kg</p>
            <p><strong>Altura:</strong> {{ $animal['altura'] }} cm</p>
            <p><strong>Fecha nacimiento:</strong> {{ $animal['fechaNacimiento'] }}</p>
            <p><strong>Alimentación:</strong> {{ $animal['alimentacion'] }}</p>
            <p class="mt-4">{{ $animal['descripcion'] }}</p>

            <div class="mt-6 flex gap-4">
                <a href="{{ url('animales/' . 0 . '/editar') }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Editar</a>
                <a href="{{ url('animales') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Volver</a>
            </div>
        </div>
    </div>
@endsection
