@extends('layouts.app')

@section('contenido')
    {{-- Hero Section con imagen de fondo --}}
    <div class="relative bg-gray-900 text-white">
        <div class="absolute inset-0">
            <img src="{{ asset('imagenes/hero-bg.jpg') }}" class="w-full h-full object-cover opacity-50">
        </div>
        <div class="relative max-w-7xl mx-auto py-24 px-4">
            <h1 class="text-5xl font-extrabold tracking-tight mb-4">Tienda Kepasa</h1>
            <p class="text-xl max-w-3xl">Descubre nuestra selección de productos premium al mejor precio</p>
        </div>
    </div>

    {{-- Barra de filtros flotante --}}
    <div class="sticky top-0 z-10 bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-3">
            <div class="flex items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <select class="px-4 py-2 border-2 border-gray-200 rounded-full hover:border-blue-500 focus:border-blue-500 focus:ring-0 transition-colors">
                        <option value="">Todas las categorías</option>
                        @foreach($familias as $familia)
                            <option value="{{ $familia->id }}">{{ $familia->nombre }}</option>
                        @endforeach
                    </select>
                    <div class="relative">
                        <input type="search" 
                               placeholder="Buscar productos..." 
                               class="pl-10 pr-4 py-2 w-72 border-2 border-gray-200 rounded-full hover:border-blue-500 focus:border-blue-500 focus:ring-0 transition-colors">
                        <svg class="w-5 h-5 absolute left-3 top-1/2 -mt-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Grid de productos con diseño mejorado --}}
    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-8 gap-y-12"> {{-- Aumentado el gap vertical --}}
            @foreach($productos as $producto)
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 mb-4"> {{-- Añadido margen inferior --}}
                    <a href="{{ route('productos.show', $producto) }}" class="block">
                        <div class="relative overflow-hidden rounded-t-lg">
                            @if ($producto->imagenes->isNotEmpty())
                                <img src="{{ asset('imagenes/' . $producto->imagenes->first()->archivo) }}" 
                                     alt="{{ $producto->nombre }}"
                                     class="w-full h-64 object-cover transform hover:scale-105 transition-transform duration-300">
                            @else
                                <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                                    <span class="text-gray-400">Sin imagen</span>
                                </div>
                            @endif
                            
                            @if($producto->oferta)
                                <div class="absolute top-4 right-4">
                                    <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                                        Oferta
                                    </span>
                                </div>
                            @endif
                        </div>

                        <div class="p-4">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm text-blue-600 font-medium">{{ $producto->familia->nombre }}</span>
                                <span class="text-lg font-bold text-gray-900">{{ number_format($producto->precio, 2) }}€</span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $producto->nombre }}</h3>
                            <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                                {{ Str::limit($producto->descripcion, 100) }}
                            </p>
                            <div class="flex justify-between items-center">
                                <span class="text-blue-600 hover:text-blue-800 font-medium flex items-center">
                                    Ver detalles
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </span>
                                @auth
                                    @role('cliente')
                                        <form method="POST" action="{{ route('productos.agregar', $producto) }}" class="inline">
                                            @csrf
                                            <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded-full text-sm hover:bg-green-600 transition-colors">
                                                Añadir al carrito
                                            </button>
                                        </form>
                                    @endrole
                                @endauth
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
