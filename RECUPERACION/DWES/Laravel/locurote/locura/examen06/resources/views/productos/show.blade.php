@extends('layouts.nav')

@section('content')
<h1>Detalle del Producto</h1>

<p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
<p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
<p><strong>Precio:</strong> ${{ $producto->precio }}</p>
<p><strong>Familia:</strong> {{ $producto->familia->nombre }}</p>

@if($producto->imagenes->first())
    <p><strong>Imagen:</strong></p>
    <img src="{{ asset('storage/' . $producto->imagenes->first()->archivo) }}" width="200">
@endif

<br><br>
<a href="{{ route('productos.index') }}">← Volver</a>
@endsection
