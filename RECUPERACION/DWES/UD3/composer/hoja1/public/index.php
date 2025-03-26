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
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['iban'])) {
        $iban = $_POST['iban'];
        $validador = new ValidarIBAN($iban);

        if (!$validador->validarLongitud()) {
            echo "<p style='color:red;'>El IBAN debe tener 24 caracteres y comenzar con ES.</p>";
        } elseif (!$validador->validarDigitoControl()) {
            echo "<p style='color:red;'>El dígito de control del IBAN es incorrecto.</p>";
        } elseif (!$validador->validarCCC()) {
            echo "<p style='color:red;'>El CCC es incorrecto.</p>";
        } else {
            echo "<p style='color:green;'>IBAN válido.</p>";
        }
    }
    ?>
</body>
</html>
