@extends('layouts.app')

@section('contenido')
    <h1 class="text-2xl font-bold mb-4">{{ $producto->nombre }}</h1>

    @if ($producto->imagenes->isNotEmpty())
    <img src="{{ asset('storage/imagenes/' . $producto->imagenes->first()->archivo) }}" alt="Imagen del producto">
@endif

    <p class="mb-2"><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
    <p class="mb-2"><strong>Familia:</strong> {{ $producto->familia->nombre }}</p>

    @auth
        @role('cliente')
            <form method="POST" action="{{ route('productos.agregar', $producto) }}">
                @csrf
                <button class="mt-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Añadir a la cesta
                </button>
            </form>
        @endrole

        @role('administrador')
            <a href="{{ route('productos.edit', $producto) }}" class="mt-4 inline-block px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Editar</a>

            <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="inline-block ml-2">
                @csrf
                @method('DELETE')
                <button class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Borrar</button>
            </form>
        @endrole
    @endauth
@endsection
