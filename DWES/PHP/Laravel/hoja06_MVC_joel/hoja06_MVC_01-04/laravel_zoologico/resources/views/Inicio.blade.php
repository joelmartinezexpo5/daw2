<!DOCTYPE html>
<html lang="en">
<head @vite('resources/css/app.css')>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layouts.plantilla')
    @section('titulo', 'Zoologico')
    @section('contenido')
    <h1 class="text-3xl font-bold underline">Pagina principal</h1>
    @endsection
</body>
</html>
