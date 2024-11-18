<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\DB;

$db = new DB();
$categorias = $db->getCategorias();

echo '<form method="GET" action="categorias.php">';
echo '<select name="categoria_id">';
foreach ($categorias as $categoria) {
    echo "<option value=\"{$categoria['id']}\">{$categoria['nombre']}</option>";
}
echo '</select>';
echo '<button type="submit">Ver productos</button>';
echo '</form>';
