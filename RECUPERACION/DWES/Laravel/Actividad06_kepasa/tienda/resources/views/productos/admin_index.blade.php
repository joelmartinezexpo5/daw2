@extends('layouts.app')

@section('contenido')
<div class="max-w-7xl mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Panel de Administración de Productos</h1>
        <a href="{{ route('productos.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Nuevo Producto
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto border border-gray-200">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Nombre</th>
                    <th class="px-4 py-2 text-left">Descripción</th>
                    <th class="px-4 py-2 text-left">Familia</th>
                    <th class="px-4 py-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($productos as $producto)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $producto->id }}</td>
                        <td class="px-4 py-2">{{ $producto->nombre }}</td>
                        <td class="px-4 py-2 text-sm text-gray-600 truncate max-w-xs">{{ $producto->descripcion }}</td>
                        <td class="px-4 py-2">{{ $producto->familia->nombre ?? 'Sin familia' }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('productos.edit', $producto) }}" class="text-yellow-600 hover:underline">Editar</a>

                            <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de eliminar este producto?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-4 text-center text-gray-500">No hay productos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
