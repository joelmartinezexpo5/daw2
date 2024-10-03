<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
require_once 'Alimentacion.php';
require_once 'Electronica.php';

// Crear un array para almacenar los productos de la cesta de la compra
$cesta = [];

// Añadir productos de alimentación
$cesta[] = new Alimentacion('A001', 'Leche', 1.50, 12, 2024);
$cesta[] = new Alimentacion('A002', 'Pan', 0.80, 11, 2023);

// Añadir productos de electrónica
$cesta[] = new Electronica('E001', 'Televisor', 300.00, 2);
$cesta[] = new Electronica('E002', 'Teléfono móvil', 600.00, 1);

// Mostrar los datos de cada producto en la cesta
echo "<h2>Productos en la cesta de la compra:</h2>";
$total_alimentacion = 0;
$total_electronica = 0;

foreach ($cesta as $producto) {
    $producto->mostrar();
    // Calcular los totales por tipo de producto
    if ($producto instanceof Alimentacion) {
        $total_alimentacion += $producto->getPrecio();
    } elseif ($producto instanceof Electronica) {
        $total_electronica += $producto->getPrecio();
    }
}

// Mostrar el importe total de todos los productos comprados
$total_completo = $total_alimentacion + $total_electronica;
echo "<h2>Importe total: {$total_completo}€</h2>";

// Mostrar en cuál de los dos tipos de productos se ha gastado más
if ($total_alimentacion > $total_electronica) {
    echo "<h2>Se ha gastado más en productos de Alimentación ({$total_alimentacion}€)</h2>";
} else {
    echo "<h2>Se ha gastado más en productos de Electrónica ({$total_electronica}€)</h2>";
}
?>

</body>
</html>