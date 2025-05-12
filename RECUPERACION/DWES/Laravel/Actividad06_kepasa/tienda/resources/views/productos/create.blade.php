@extends('layouts.app')

@section('contenido')
    <h1 class="text-2xl font-bold mb-4">Nuevo producto</h1>

    <form method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label for="nombre" class="block font-semibold">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="w-full border rounded px-3 py-2" value="{{ old('nombre') }}" required>
        </div>

        <div>
            <label for="descripcion" class="block font-semibold">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="w-full border rounded px-3 py-2" required>{{ old('descripcion') }}</textarea>
        </div>

        <div>
            <label for="familia_id" class="block font-semibold">Familia</label>
            <select name="familia_id" id="familia_id" class="w-full border rounded px-3 py-2" required>
                @foreach($familias as $familia)
                    <option value="{{ $familia->id }}">{{ $familia->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="imagen" class="block font-semibold">Imagen (opcional, solo .jpg o .jpeg)</label>
            <input type="file" name="imagen" id="imagen" accept=".jpg,.jpeg" class="w-full">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Guardar</button>
    </form>
@endsection
