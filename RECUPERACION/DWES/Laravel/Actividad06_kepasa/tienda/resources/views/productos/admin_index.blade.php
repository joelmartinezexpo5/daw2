@extends('layouts.app')

@section('contenido')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Gestión de Productos</h1>
        <a href="{{ route('productos.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            + Nuevo Producto
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if($productos->isEmpty())
        <p>No hay productos registrados.</p>
    @else
        <table class="min-w-full border border-gray-300 rounded">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border-b">ID</th>
                    <th class="px-4 py-2 border-b">Nombre</th>
                    <th class="px-4 py-2 border-b">Descripción</th>
                    <th class="px-4 py-2 border-b">Familia</th>
                    <th class="px-4 py-2 border-b">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b">{{ $producto->id }}</td>
                        <td class="px-4 py-2 border-b">{{ $producto->nombre }}</td>
                        <td class="px-4 py-2 border-b">{{ Str::limit($producto->descripcion, 50) }}</td>
                        <td class="px-4 py-2 border-b">{{ $producto->familia->nombre ?? 'N/A' }}</td>
                        <td class="px-4 py-2 border-b space-x-2">
                            <a href="{{ route('productos.edit', $producto) }}" class="px-2 py-1 bg-yellow-500 rounded hover:bg-yellow-600 text-white">Editar</a>

                            <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="inline" onsubmit="return confirm('¿Seguro que quieres eliminar este producto?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2 py-1 bg-red-600 rounded hover:bg-red-700 text-white">Eliminar</button>
                            </form>

                            <a href="{{ route('productos.show', $producto) }}" class="px-2 py-1 bg-blue-600 rounded hover:bg-blue-700 text-white">Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
