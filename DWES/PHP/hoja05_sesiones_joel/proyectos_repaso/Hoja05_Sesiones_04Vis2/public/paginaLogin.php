<?php
require_once __DIR__.'/../vendor/autoload.php';

iniciar_sesion();

if(estaLogueado()){
    redireccionar('index.php?action=paginaConectado');
}

$error = flash('error');
$correo = $_SESSION['correo'] ?? '';
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
    <h1>Inicio de Sesión</h1>
    <?php if ($error): ?>
        <p style="color: red;"><?= htmlspecialchars(string: $error) ?></p>
    <?php endif; ?>
    <form action="index.php?action=autenticar" method="post">
        <label for="correo">
            Correo Electrónico:
        </label>
        <input type="text" name="correo" value="<?=$correo?>">

        <lable for="contraseña">
            Contraseña:
        </lable>
        <input type="password" name="contraseña">
        <br>
        <button type="submit">Iniciar Sesion</button>
    </form>
</body>
</html>