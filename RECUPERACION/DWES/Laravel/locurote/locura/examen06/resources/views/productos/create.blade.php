<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Crear producto</title>
</head>
<body>

@include('partials.nav')

<h1>Crear producto</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('productos.store') }}" method="POST">
    @csrf

    <div>
        <label>Título:</label><br/>
        <input type="text" name="titulo" value="{{ old('titulo') }}" required>
    </div>

    <div>
        <label>Descripción:</label><br/>
        <textarea name="descripcion" rows="5" required>{{ old('descripcion') }}</textarea>
    </div>

    <div>
        <label>Precio:</label><br/>
        <input type="number" step="0.01" name="precio" value="{{ old('precio') }}" required>
    </div>

    <div>
        <label>Nombre de la imagen (sin extensión):</label><br/>
        <input type="text" name="imagen" value="{{ old('imagen') }}" required>
        <small>Ejemplo: 978-1520363462</small>
    </div>

    <div>
        <label>Familia:</label><br/>
        <select name="familia_codigo" required>
            @foreach ($familias as $familia)
                <option value="{{ $familia->codigo }}" {{ old('familia_codigo') == $familia->codigo ? 'selected' : '' }}>
                    {{ $familia->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <br/>
    <button type="submit">Crear producto</button>
</form>

</body>
</html>
