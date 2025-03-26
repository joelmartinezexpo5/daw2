<?php
require_once '../vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de envio de correo</title>
</head>
<style>
    body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }
        form {
            width: 400px;
            margin: 0 auto;
        }
        input, textarea {
            width: 100%;
            margin-bottom: 10px;
            padding: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            width: 100px;
            margin: 0 auto;
            display: block;
            background: #333;
            color: #fff;
            border: 0;
            cursor: pointer;
        }
        .errors {
            width: 400px;
            margin: 0 auto;
            background: #f00;
            color: #fff;
            padding: 10px;
        }
        .success {
            width: 400px;
            margin: 0 auto;
            background: #0f0;
            color: #fff;
            padding: 10px;
        }
</style>
<body>
    <?php if (isset($_GET['error'])): ?>
        <div class="errors">
            <?php if ($_GET['error'] == 1): ?>
                <p>Por favor, rellena todos los campos.</p>
            <?php elseif ($_GET['error'] == 2): ?>
                <p>Por favor, introduce un correo electrónico válido.</p>
            <?php elseif ($_GET['error'] == 3): ?>
                <p>Ha ocurrido un error al enviar el correo.</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <!-- si el email se ha enviado correctamente, lo mostramos -->
    <?php if (isset($_GET['success'])): ?>
        <div class="success">
            <p>El correo se ha enviado correctamente.</p>
        </div>
    <?php endif; ?>

    <form action="Procesar.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <br>
        <label for="correo">Direccion de correo</label>
        <input type="text" name="correo" id="correo">
        <br>
        <label for="mensaje">Mensaje</label>
        <textarea name="mensaje" id="mensaje"></textarea>
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>