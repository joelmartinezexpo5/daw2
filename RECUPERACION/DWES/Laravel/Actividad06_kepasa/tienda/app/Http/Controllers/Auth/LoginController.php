<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Método para redirigir después de iniciar sesión
    protected function redirectTo()
    {
        return route('productos');  // Redirige a la ruta que has definido en 'inicio'
    }
}
