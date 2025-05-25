<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Editar producto</title>
</head>
<body>

@include('partials.nav')

<h1>Editar producto</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('productos.update', $producto) }}">
    @csrf
    @method('PUT')

    <div>
        <label>Título:</label><br/>
        <input type="text" name="titulo" value="{{ old('titulo', $producto->titulo) }}" required>
    </div>

    <div>
        <label>Descripción:</label><br/>
        <textarea name="descripcion" rows="5" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
    </div>

    <div>
        <label>Precio:</label><br/>
        <input type="number" step="0.01" name="precio" value="{{ old('precio', $producto->precio) }}" required>
    </div>

    <div>
        <label>Nombre de la imagen (sin extensión):</label><br/>
        <input type="text" name="imagen" value="{{ old('imagen', $producto->imagen) }}" required>
        <small>Ejemplo: 978-1520363462</small>
    </div>

    <div>
        <label>Familia:</label><br/>
        <select name="familia_codigo" required>
            @foreach ($familias as $familia)
                <option value="{{ $familia->codigo }}" {{ old('familia_codigo', $producto->familia_codigo) == $familia->codigo ? 'selected' : '' }}>
                    {{ $familia->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <br/>
    <button type="submit">Actualizar producto</button>
</form>

</body>
</html>
