<?php
require_once "../vendor/autoload.php";

use Ejercicio0405\ClasesBD\FuncionesBD;

$mensaje = "";
//miramos si se han pasado todos los campos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';

   
    if (empty($usuario) || empty($password)) {
        $mensaje = "Por favor, rellena todos los campos.";
    } else {
        $funciones = new FuncionesBD();

        //registramos al usuario
        if ($funciones->registrarUsuario($usuario, $password)) {
            $mensaje = "Usuario registrado correctamente.";
        } else {
            $mensaje = "Error al registrar el usuario. Es posible que el nombre ya esté en uso.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estilosRegistro.css">
    <title>Registro de Usuarios</title>
</head>
<body>
    <h1>Registro de Usuarios</h1>

    <?php if (!empty($mensaje)){
        echo '<p>'. $mensaje .'</p>';
    } ?>

    <form action="registro.php" method="POST">
        <label for="usuario">Nombre de usuario:</label><br>
        <input type="text" id="usuario" name="usuario" required><br><br>

        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Registrar</button>
    </form>
</body>
</html>