@extends('layouts.app')

@section('contenido')
<div class="bg-gray-100 min-h-screen py-12">
    <div class="max-w-6xl mx-auto px-4">
        {{-- Breadcrumb --}}
        <nav class="flex mb-8 text-sm">
            <a href="{{ route('productos.index') }}" class="text-gray-500 hover:text-blue-600">Tienda</a>
            <span class="mx-2 text-gray-500">/</span>
            <span class="text-gray-800">{{ $producto->nombre }}</span>
        </nav>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2">
                {{-- Columna de imagen --}}
                <div class="relative">
                    @if ($producto->imagenes->isNotEmpty())
                        <div class="aspect-square">
                            <img src="{{ asset('imagenes/' . $producto->imagenes->first()->archivo) }}"
                                 alt="Imagen de {{ $producto->nombre }}"
                                 class="w-full h-full object-cover">
                        </div>
                    @else
                        <div class="aspect-square bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400">Sin imagen disponible</span>
                        </div>
                    @endif
                </div>

                {{-- Columna de información --}}
                <div class="p-8 flex flex-col">
                    {{-- Cabecera del producto --}}
                    <div class="mb-6">
                        <span class="text-blue-600 font-medium text-sm mb-2 block">
                            {{ $producto->familia->nombre }}
                        </span>
                        <h1 class="text-3xl font-bold text-gray-900 mb-4">
                            {{ $producto->nombre }}
                        </h1>
                        <p class="text-gray-600 leading-relaxed mb-6">
                            {{ $producto->descripcion }}
                        </p>
                    </div>

                    {{-- Precio y stock --}}
                    <div class="mb-8">
                        <div class="flex items-baseline gap-2">
                            <span class="text-3xl font-bold text-gray-900">
                                {{ number_format($producto->precio, 2) }}€
                            </span>
                            @if($producto->oferta)
                                <span class="text-sm font-medium text-red-600">En oferta</span>
                            @endif
                        </div>
                        <span class="text-sm text-green-600 mt-2 block">
                            Disponible para envío inmediato
                        </span>
                    </div>

                    {{-- Acciones --}}
                    <div class="mt-auto">
                        @auth
                            @role('cliente')
                                <form method="POST" action="{{ route('productos.agregar', $producto) }}">
                                    @csrf
                                    <button type="submit"
                                            class="w-full bg-blue-600 text-white py-4 px-6 rounded-lg font-semibold hover:bg-blue-700 transition-colors flex items-center justify-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        </svg>
                                        Añadir a la cesta
                                    </button>
                                </form>
                            @endrole
                        @endauth

                        @guest
                            <div class="text-center p-4 bg-gray-50 rounded-lg">
                                <p class="text-gray-600">
                                    Inicia sesión para poder comprar este producto
                                </p>
                                <a href="{{ route('login') }}" 
                                   class="text-blue-600 hover:text-blue-800 font-medium mt-2 inline-block">
                                    Iniciar sesión
                                </a>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
