@extends('layouts.plantilla')
    {{-- @section('titulo', 'Zoologico-Mostrar el animal'.$animal) --}}
    @section('contenido')
    <div class="flex">
        <div class="w-1/2 p-4">
            <img src="{{ asset('assets/imagenes/' . $animal->imagen) }}" alt="{{ $animal->especie }}" class="w-full h-auto rounded">
        </div>
        <div class="w-1/2 p-4">
            <h1 class="text-4xl font-bold">{{ $animal['especie'] }}</h1>
            <p><strong>Peso:</strong> {{ $animal['peso'] }} kg</p>
            <p><strong>Altura:</strong> {{ $animal['altura'] }} cm</p>
            <p><strong>Fecha de Nacimiento:</strong> {{ $animal['fechaNacimiento'] }}</p>
            <p><strong>Alimentación:</strong> {{ $animal['alimentacion'] }}</p>
            <p class="mt-4">{{ $animal['descripcion'] }}</p>
            <div class="mt-6">
                <a href="{{ route('animales.edit', $animal) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Editar</a>
                <a href="{{ route('animales.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded ml-4">Volver</a>
            </div>
            <br>
            <h3>Revisiones del animal</h3>
            @if ($animal->revisiones->count())
                <ul>
                    @foreach ($animal->revisiones as $revision)
                        <li>
                            <strong>{{ $revision->fecha }}</strong> - {{ $revision->descripcion }}
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No tiene revisiones.</p>
            @endif

            <a href="{{ route('revisiones.create', $animal->slug) }}">
                <button class="bverde">Añadir revisión</button>
            </a>
        </div>


    </div>

    @endsection

