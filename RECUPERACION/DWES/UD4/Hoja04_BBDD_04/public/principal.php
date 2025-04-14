<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/FuncionesBD.php';


$productos = getProductos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos del Supermercado</title>
</head>
<body>
    <h1>Todos los Productos</h1>
    <?php foreach ($productos as $producto): ?>
        <p><?= $producto ?></p>
    <?php endforeach; ?>
</body>
</html>
