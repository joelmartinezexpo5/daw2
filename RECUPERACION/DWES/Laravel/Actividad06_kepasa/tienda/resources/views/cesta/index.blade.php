@extends('layouts.app')

@section('contenido')
    <h1 class="text-2xl font-bold mb-4">Mi cesta</h1>

    @php
        $cesta = session('cesta', []);
    @endphp

    @if(count($cesta) > 0)
        <ul class="divide-y">
            @foreach($cesta as $producto)
                <li class="py-4 flex justify-between items-center">
                    <div>
                        <h2 class="font-semibold">{{ $producto['nombre'] }}</h2>
                        <p class="text-sm text-gray-600">{{ $producto['descripcion'] ?? '' }}</p>
                    </div>
                    <form action="{{ route('cesta.eliminar', $producto['id']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline">Eliminar</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <form action="{{ route('cesta.vaciar') }}" method="POST" class="mt-4">
            @csrf
            @method('DELETE')
            <button class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Vaciar cesta</button>
        </form>
    @else
        <p>No tienes productos en tu cesta.</p>
    @endif
@endsection
