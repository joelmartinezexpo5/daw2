<?php
session_start();
require_once dirname(__DIR__) . '/vendor/autoload.php';

use Ejercicio03\Models\ModeloUsuario;
use Ejercicio03\clases\PDOUsuario;
use Ejercicio03\clases\Usuario;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.min.css" rel="stylesheet">


    <title>Funicular</title>
</head>

<body class="container">
    <?php
    if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
        enviarAutenticacion();
    }
    $nombre_usuario = $_SERVER['PHP_AUTH_USER'];
    $contrasenia_usuario = $_SERVER['PHP_AUTH_PW'];
    $usuario = new ModeloUsuario();
    $usuario->setNombre($nombre_usuario);
    $usuario->setContrasenia($contrasenia_usuario);

    //? Accedemos al hash de la contraseña de la base de datos
    $contrasenia_encriptada = password_hash($usuario->getContrasenia(), PASSWORD_BCRYPT);


    $usuarioPDO = new Usuario(new PDOUsuario());


    if (!$usuarioPDO->loguearse($usuario)) {
        enviarAutenticacion();
    }

    function enviarAutenticacion()
    {
        header('WWW-Authenticate: Basic Realm="Contenido restringido"');
        header('HTTP/1.0 401 Unauthorized');
        echo "Usuario no reconocido!";
        exit;
    }

    ?>
    <h1>Gestionar Sesiones</h1>
    <h3><?php echo 'Nombre de usuario: ' . $nombre_usuario ?></h3>
    <hr>
    <h3><?php echo 'Hash de la contraseña: ' . $contrasenia_encriptada ?></h3>
    <hr>
    <?php if (!isset($_SESSION['visitas'])) {
        //? Hay que definirlo antes de usarlo
        $_SESSION['visitas'] = [];
    }
    //? Añadimos el valor de cada instante al array de visitas
    $_SESSION['visitas'][] = "Nueva visita: " . date("d-m-Y H:i:s");
    $instantes = $_SESSION['visitas']; ?>
    <ul><?php foreach ($instantes as $instante): ?>
            <li style="border: 1px solid #ddd; padding: 10px; margin-bottom: 5px; border-radius: 5px;"><?php echo $instante; ?></li>
        <?php endforeach; ?>
    </ul>
    
    <a href="Fuentes/borrar.php">Borrar</a>

    <!-- <form action="index.php" method="post">
        <input type="submit" id="borrarBtn" value="Borrar">
    </form> -->
    <!-- 
     php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        unset($_SESSION['visitas']);
        header ("Location: index.php");
        exit;
    } ?> -->

</body>

</html>