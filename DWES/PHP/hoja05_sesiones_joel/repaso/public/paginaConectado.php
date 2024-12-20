<?php

require_once __DIR__ . '/../vendor/autoload.php';

use function App\iniciar_sesion;
use function App\estaLogueado;
use function App\flash;
use function App\redireccionar;

iniciar_sesion();

if (!estaLogueado()) {
    flash('error', 'No tienes acceso a esta página');
    redireccionar('/index.php?action=paginaLogin');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Conectado</title>
</head>
<body>
    <h1>¡Bienvenido!</h1>
    <p>Hola, tu ID de usuario es: <?= htmlspecialchars($_SESSION['user_id']) ?></p>
    <p>Has visitado esta página <?= htmlspecialchars($_SESSION['visitas'] ?? 1) ?> veces.</p>
    <a href="/index.php?action=desconectarse">Cerrar sesión</a>
</body>
</html>
