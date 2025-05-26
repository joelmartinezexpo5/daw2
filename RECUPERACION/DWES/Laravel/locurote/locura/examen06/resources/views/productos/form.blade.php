@if($errors->any())
    <ul style="color:red;">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" enctype="multipart/form-data" action="{{ isset($producto) ? route('productos.update', $producto) : route('productos.store') }}">
    @csrf
    @if(isset($producto))
        @method('PUT')
    @endif

    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="{{ old('nombre', $producto->nombre ?? '') }}"><br><br>

    <label>Descripción:</label><br>
    <textarea name="descripcion">{{ old('descripcion', $producto->descripcion ?? '') }}</textarea><br><br>

    <label>Precio:</label><br>
    <input type="number" step="0.01" name="precio" value="{{ old('precio', $producto->precio ?? '') }}"><br><br>

    <label>Familia:</label><br>
    <select name="familia_id">
        @foreach($familias as $familia)
            <option value="{{ $familia->id }}" {{ (old('familia_id', $producto->familia_id ?? '') == $familia->id) ? 'selected' : '' }}>
                {{ $familia->nombre }}
            </option>
        @endforeach
    </select><br><br>

    <label>Imagen:</label><br>
    <input type="file" name="archivo"><br><br>

    @if(isset($producto) && $producto->imagenes->first())
        <img src="{{ asset('storage/' . $producto->imagenes->first()->archivo) }}" width="100"><br><br>
    @endif

    <button type="submit">Guardar</button>
</form>