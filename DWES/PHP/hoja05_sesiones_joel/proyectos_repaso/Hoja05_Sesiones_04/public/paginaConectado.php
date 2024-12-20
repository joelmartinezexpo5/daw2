<?php
require_once dirname(__DIR__).'/vendor/autoload.php';
require_once dirname(__DIR__).'/src/Ficheros/helper.php';

use function App\Ficheros\flash;
use function App\Ficheros\iniciar_sesion;
use function App\Ficheros\redireccionar;


iniciar_sesion();

/**
 ** Comprobar si el usuario esta logueado, si no lo está mostrar el error
 ** y redirigir a la página de login
 */
 if (!isset($_SESSION['usuario'])) {
    flash('error', 'Por favor, inicia sesión');
    redireccionar('index.php?action=paginaLogin');
    exit;
}

//* Si está logueado, recuperar el objeto Usuario desde la sesion
$usuario = $_SESSION['usuario'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.min.css" rel="stylesheet">
    <title>Conectado</title>
</head>
<body class="container">
    <article>
    <div>
        <h1>Te has conectado</h1>
        <p>Tu id de usuario es <span style="color: red;"><?php echo $usuario->getId();?></span></p>
        <form action="index.php?action=desconectarse" method="POST">
            <button type="submit">Cerrar Sesión</button>
        </form>
    </div>
    </article>
</body>
</html>