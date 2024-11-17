<?php
echo 'hola mundo';
require_once __DIR__ . '/../vendor/autoload.php';

$productos = obtenerProductos();

foreach ($productos as $producto) {
    echo $producto . "<br>";
}
