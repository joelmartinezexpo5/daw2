@extends('layouts.app')

@section('contenido')
    <h1 class="text-2xl font-bold mb-4">Editar producto</h1>

    <form method="POST" action="{{ route('productos.update', $producto) }}" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="nombre" class="block font-semibold">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="w-full border rounded px-3 py-2" value="{{ old('nombre', $producto->nombre) }}" required>
        </div>

        <div>
            <label for="precio" class="block font-semibold">Precio</label>
            <input type="number" step="0.01" name="precio" id="precio" value="{{ old('precio', $producto->precio ?? '') }}" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label for="descripcion" class="block font-semibold">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="w-full border rounded px-3 py-2" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
        </div>

        <div>
            <label for="familia_id" class="block font-semibold">Familia</label>
            <select name="familia_id" id="familia_id" class="w-full border rounded px-3 py-2" required>
                @foreach($familias as $familia)
                    <option value="{{ $familia->id }}" @selected($familia->id == $producto->familia_id)>
                        {{ $familia->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="imagen" class="block font-semibold">Imagen nueva (opcional)</label>
            <input type="file" name="imagen" id="imagen" accept=".jpg,.jpeg" class="w-full">
        </div>

        <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">Actualizar</button>
    </form>
@endsection
