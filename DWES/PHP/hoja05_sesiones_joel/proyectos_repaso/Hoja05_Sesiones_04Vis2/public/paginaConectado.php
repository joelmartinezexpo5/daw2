<?php
require_once __DIR__ . '/../vendor/autoload.php';
iniciar_sesion();

if (!estaLogueado()) {
    flash('error', 'No tienes acceso a esta pagina');
    redireccionar('index.php?action=paginaLogin');
}

$id = $_SESSION['usuario'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>

<body>
    <h1>Te has conectado</h1>
    <p>Hola tu ID usuario es <?= $id ?></p>
    <a href="index.php?action=desconectarse">Cerrar Sesión</a>
</body>

</html>