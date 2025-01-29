@extends('layouts.plantilla')
    @section('contenido')
    <form action="{{ route('revisiones.store', $animal->slug) }}" method="POST">
        @csrf
        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" id="fecha" required>

        <br>

        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion" required></textarea>

        <br>

        <button type="submit" class="bverde">Guardar revisión</button>
    </form>
    @endsection
