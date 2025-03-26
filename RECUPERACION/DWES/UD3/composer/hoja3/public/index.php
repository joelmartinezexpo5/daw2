<?php
require __DIR__ . '/../vendor/autoload.php';
use MiAplicacion\Classes\AdaptadorGeneradorPassword;

$generador = new AdaptadorGeneradorPassword();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $longitud = $_POST['longitud'] ?? 12;
    $mayusculas = isset($_POST['mayusculas']);
    $minusculas = isset($_POST['minusculas']);
    $numeros = isset($_POST['numeros']);
    $simbolos = isset($_POST['simbolos']);
    
    $password = $generador->generar($longitud, $mayusculas, $minusculas, $numeros, $simbolos);
} else {
    $password = '';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generador de Contraseñas</title>
</head>
<body>
    <h1>Generador de Contraseñas</h1>
    <form method="post">
        <label>Longitud: <input type="number" name="longitud" value="12" min="4" max="64"></label><br>
        <label><input type="checkbox" name="mayusculas"> Incluir mayúsculas</label><br>
        <label><input type="checkbox" name="minusculas"> Incluir minúsculas</label><br>
        <label><input type="checkbox" name="numeros"> Incluir números</label><br>
        <label><input type="checkbox" name="simbolos"> Incluir símbolos</label><br>
        <button type="submit">Generar</button>
    </form>
    <?php if ($password): ?>
        <h2>Contraseña generada:</h2>
        <p><strong><?= $password; ?></strong></p>
    <?php endif; ?>
</body>
</html>