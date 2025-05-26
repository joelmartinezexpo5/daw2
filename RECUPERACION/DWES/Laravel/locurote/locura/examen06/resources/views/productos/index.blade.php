@extends('layouts.nav')

@section('content')
<h1>Listado de Productos</h1>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Familia</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
        <tr>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->familia->nombre }}</td>
            <td>${{ $producto->precio }}</td>
            <td>
                @if($producto->imagenes->first())
                    <img src="{{ asset('storage/' . $producto->imagenes->first()->archivo) }}" width="60">
                @endif
            </td>
            <td>
                <a href="{{ route('productos.show', $producto) }}">Ver</a>
                <a href="{{ route('productos.edit', $producto) }}">Editar</a>
                <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Eliminar este producto?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection