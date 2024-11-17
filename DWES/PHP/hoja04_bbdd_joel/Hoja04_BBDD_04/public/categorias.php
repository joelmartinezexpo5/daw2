<?php

require_once __DIR__ . '/../vendor/autoload.php';

$categorias = obtenerCategorias();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoriaId = (int)$_POST['categoria'];
    $productos = obtenerProductosPorCategoria($categoriaId);

    foreach ($productos as $producto) {
        echo $producto . "<br>";
    }
} else {
    echo '<form method="POST">';
    echo '<select name="categoria">';
    foreach ($categorias as $categoria) {
        echo "<option value='{$categoria->getId()}'>{$categoria->getNombre()}</option>";
    }
    echo '</select>';
    echo '<button type="submit">Filtrar</button>';
    echo '</form>';
}
