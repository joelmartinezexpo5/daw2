<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\DB;

// Crear una instancia de la clase DB
$db = new DB();

// Obtener todos los productos
$productos = $db->getProductos();

// Mostrar los productos
foreach ($productos as $producto) {
    echo "Producto: {$producto['nombre']} - Precio: {$producto['precio']} - Categoría: {$producto['categoria']}<br>";
}
