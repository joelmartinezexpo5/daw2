<?php
namespace App\Ficheros;

session_start();
function flash(string $clave, string $mensaje = null): string|null
{
    //? Si se pasa un mensaje, lo guardamos en la sesión bajo la clave especificada
    if ($mensaje !== null) {
        $_SESSION['flash'][$clave] = $mensaje; // Guardamos el mensaje temporal en la sesión
        return $mensaje; // Devolvemos el mensaje recién guardado
    }

    //? Si no se pasa un mensaje, recuperamos el mensaje asociado a la clave
    if (isset($_SESSION['flash'][$clave])) {
        $mensajeGuardado = $_SESSION['flash'][$clave]; //? Recuperamos el mensaje que ya teniamos asociado
        /**
         *? Eliminamos el mensaje después de recuperarlo, siendo así "flash", 
         *? ya que si se vuelve a pasar la misma clave buscara el mensaje asociado 
         *? y lo eliminara de la sesion
        */
        unset($_SESSION['flash'][$clave]);
        return $mensajeGuardado; //? Devolvemos el mensaje recuperado antes de ser borrado
    }

    //? Si no hay mensaje guardado y no se pasa nada, devolvemos null
    return null;
}


//? Verifica si la sesion esta iniciada
function iniciar_sesion()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

//? Verifica si existe la clave usuario en la sesion
function estaLogueado(): bool
{
    return isset($_SESSION['usuario']);
}

//? Redirecciona a la pagina que se pase por parametro
function redireccionar(string $path)
{
    header("Location: {$path}");
    exit;
}

//? Comprueba que el metodo de la llamada ha sido realizado por post
function esPost(): bool
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}
