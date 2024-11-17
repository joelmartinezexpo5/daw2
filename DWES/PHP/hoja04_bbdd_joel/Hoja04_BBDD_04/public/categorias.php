<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\DB;

// Crear una instancia de la clase DB
$db = new DB();

// Obtener todas las categorías
$categorias = $db->getCategorias();

// Mostrar el desplegable de categorías
echo '<form method="GET" action="productos_por_categoria.php">';
echo '<select name="categoria_id">';
foreach ($categorias as $categoria) {
    echo "<option value=\"{$categoria['id']}\">{$categoria['nombre']}</option>";
}
echo '</select>';
echo '<button type="submit">Ver productos</button>';
echo '</form>';
