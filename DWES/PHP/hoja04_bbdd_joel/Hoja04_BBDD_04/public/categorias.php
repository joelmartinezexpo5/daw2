<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\DB;

if (!isset($_GET['categoria_id'])) {
    echo "Por favor selecciona una categoría.";
    exit;
}

$categoriaId = (int) $_GET['categoria_id'];
$db = new DB();
$productos = $db->getProductosPorCategoria($categoriaId);

foreach ($productos as $producto) {
    echo "Producto: {$producto['nombre']} - Precio: {$producto['precio']} - Categoría: {$producto['categoria']}<br>";
}
