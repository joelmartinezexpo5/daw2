<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Tienda') }}</title>

    <!-- Fuentes y Estilos -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased bg-gray-100">

    <div class="min-h-screen">
        <!-- Navegación -->
        <nav class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between h-16 items-center">
                <div>
                    <a href="{{ route('inicio') }}" class="text-lg font-bold text-gray-700 hover:text-blue-500">Tienda Kepasa
                        
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    @auth
                        <span class="text-gray-600">Hola, {{ auth()->user()->name }}</span>

                        @role('administrador')
                            <a href="{{ route('productos.index') }}" class="text-sm text-blue-600 hover:underline">Productos</a>
                            <a href="{{ route('productos.create') }}" class="text-sm text-green-600 hover:underline">Nuevo Producto</a>
                        @endrole

                        @role('cliente')
                            <a href="{{ route('cesta.index') }}" class="text-sm text-purple-600 hover:underline">Mi Cesta</a>
                        @endrole

                        <!-- Botón Logout -->
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-red-500 hover:underline text-sm">Cerrar sesión</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">Iniciar sesión</a>
                        <a href="{{ route('register') }}" class="text-sm text-green-600 hover:underline">Registrarse</a>
                    @endauth
                </div>
            </div>
        </nav>

        <!-- Mensajes de estado -->
        @if(session('mensaje'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 m-4 rounded">
                {{ session('mensaje') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 m-4 rounded">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Contenido principal -->
        <main class="py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                @yield('contenido')
            </div>
        </main>
    </div>

    @livewireScripts
</body>
</html>
