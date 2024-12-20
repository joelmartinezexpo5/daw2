<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/src/Ficheros/helper.php';

use function App\Ficheros\estaLogueado;
use function App\Ficheros\flash;
use function App\Ficheros\iniciar_sesion;
use function App\Ficheros\redireccionar;
//* Iniciar sesion si no está iniciada
iniciar_sesion();


//* Comprobamos si esta logeuado
if (estaLogueado()) {
    redireccionar('index.php?action=paginaConectado');
}

$error = flash('error');
$correo = flash('correo');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.min.css" rel="stylesheet">
    <title>Login</title>
</head>

<body class="container">
    <article>
        <h1>Inicio de sesión</h1>
        <form class=" login-form" action="index.php?action=autenticar" method="POST">
            <label for="correo">Correo Electronico:</label>
            <input type="email" id="correo" name="correo" value="<?php echo $correo; ?>" required>

            <label for="clave">Contraseña:</label>
            <input type="password" id="clave" name="clave" required>

            <button type="submit">Iniciar sesión</button>

            <!-- Mostrar el mensaje de error si existe -->
            <?php if ($error): ?>
                <div style="color: red;">
            <p><?php echo $error; ?></p>
        </div>
    <?php endif; ?>

    </form>
    </article>
</body>
</html>