<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos App</title>
    <style>
        nav a {
            margin-right: 15px;
            text-decoration: none;
            color: blue;
        }
        body {
            font-family: sans-serif;
            margin: 20px;
        }
        .nav {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav class="nav">
        <a href="{{ route('productos.index') }}">Inicio</a>
        <a href="{{ route('productos.create') }}">Nuevo Producto</a>
    </nav>

    @yield('content')
</body>
</html>