<?php

require_once __DIR__ . '/../vendor/autoload.php';

use function App\iniciar_sesion;


use function App\estaLogueado;
use function App\flash;
use function App\redireccionar;

iniciar_sesion();

if (estaLogueado()) {
    redireccionar('/index.php?action=paginaConectado');
}

$error = flash('error');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <?php if ($error): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form action="/index.php?action=autenticar" method="POST">
        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo" value="<?= htmlspecialchars(flash('correo') ?? '') ?>" required>
        <br>
        <label for="clave">Contraseña:</label>
        <input type="password" name="clave" id="clave" required>
        <br>
        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>
