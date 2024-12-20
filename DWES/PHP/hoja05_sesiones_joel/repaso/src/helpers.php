<?php

function flash(string $clave, ?string $mensaje = null): ?string
{
    iniciar_sesion();
    if ($mensaje === null) {
        $valor = $_SESSION['flash'][$clave] ?? null;
        unset($_SESSION['flash'][$clave]);
        return $valor;
    }
    $_SESSION['flash'][$clave] = $mensaje;
    return $mensaje;
}

function iniciar_sesion(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function estaLogueado(): bool
{
    iniciar_sesion();
    return isset($_SESSION['user_id']);
}

function redireccionar(string $url): void
{
    header("Location: $url");
    exit;
}

function esPost(): bool
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}
