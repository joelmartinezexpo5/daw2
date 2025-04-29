<?php
require_once "../vendor/autoload.php";

use Ejercicio0405\ClasesBD\FuncionesBD;
//se recuperan los datos de la sesion, ya lo entendi
session_start();

$mensaje = "";
//miramos si se han enviado los datos del formulario de abajo
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';
    //si falta un campo, se pide que rellene todos
    if (empty($usuario) || empty($password)) {
        $mensaje = "Por favor, rellena todos los campos.";
    } else {
        $funciones = new FuncionesBD();

        // Verificamos las credenciales del usuario con la funcion del helper
        if ($funciones->verificarUsuario($usuario, $password)) {
            $_SESSION['usuario'] = $usuario;
            header('Location: productos.php');
            exit;
        } else {
            $mensaje = "Usuario o contraseña incorrectos.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilos/estilosLogin.css">
</head>

<body>
    <div class="contenedor">
        <h1>Iniciar Sesión</h1>
        <!--formulario de login-->
        <?php if (!empty($mensaje)): ?>
            <p class="mensaje"><?php echo $mensaje; ?></p>
        <?php endif; ?>

        <form action="login.php" method="POST" class="formulario">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>