<?php
require_once "../vendor/autoload.php"; // Cargar el autoload de Composer
use Hoja1\Classes\ValidarIBAN; // Usar la clase que contiene las validaciones
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación de IBAN</title>
</head>
<body>
    <h1>Validación de IBAN</h1>
    <form action="" method="post">
        <label for="iban">Introduce el IBAN:</label>
        <input type="text" name="iban" id="iban" required>
        <br>
        <button type="submit">Enviar</button>
    </form>

    <?php
    // Comprobar si el formulario fue enviado y si el campo IBAN está lleno
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['iban'])) {
        $iban = trim($_POST['iban']); // Limpiar espacios alrededor del IBAN

        // Crear una instancia de la clase ValidarIBAN
        $validador = new ValidarIBAN($iban);

        // Validar si el IBAN tiene la longitud y formato correcto
        if ($validador->validarLongitud()) {
            // Comprobar si el IBAN tiene un dígito de control válido
            if ($validador->validarDigitoControl()) {
                    echo "<p style='color: green;'>El IBAN ingresado es válido.</p>";
                } else {
                echo "<p style='color: red;'>El IBAN ingresado tiene un dígito de control incorrecto.</p>";
            }
        } else {
            echo "<p style='color: red;'>El IBAN ingresado no tiene el formato correcto.</p>";
        }
    }
    ?>
</body>
</html>
