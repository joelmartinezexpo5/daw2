<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Listado de productos</title>
</head>
<body>

@include('partials.nav')

<h1>Productos</h1>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Imagen</th>
            <th>Título</th>
            <th>Familia</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($productos as $producto)
            <tr>
                <td>
                    <img src="{{ asset('images/' . $producto->imagen . '.jpg') }}" alt="{{ $producto->titulo }}" width="80" />
                </td>
                <td>{{ $producto->titulo }}</td>
                <td>{{ $producto->familia->nombre ?? 'N/A' }}</td>
                <td>{{ number_format($producto->precio, 2) }} €</td>
                <td>
                    <a href="{{ route('productos.edit', $producto) }}">Editar</a> |
                    <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Seguro que quieres eliminar este producto?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background:none; border:none; color:red; cursor:pointer;">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">No hay productos aún.</td></tr>
        @endforelse
    </tbody>
</table>

</body>
</html>
