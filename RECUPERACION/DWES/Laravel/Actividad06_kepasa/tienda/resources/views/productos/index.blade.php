@extends('layouts.app')

@section('contenido')
    <h1 class="text-2xl font-bold mb-4">Lista de productos</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($productos as $producto)
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-xl font-semibold">{{ $producto->nombre }}</h2>
                <p>{{ Str::limit($producto->descripcion, 100) }}</p>
                <p class="text-sm text-gray-600">Familia: {{ $producto->familia->nombre }}</p>
                
                @if ($producto->imagenes->isNotEmpty())
    <img src="{{ asset('storage/imagenes/' . $producto->imagenes->first()->archivo) }}" alt="Imagen del producto">
@else
    <p>Sin imagen</p>
@endif

                <a href="{{ route('productos.show', $producto) }}" class="text-blue-500 mt-2 inline-block hover:underline">Ver detalle</a>
            </div>
        @endforeach
    </div>
@endsection
