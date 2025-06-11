<?php
// eliminarProducto.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id'] ?? 0);

    if ($id <= 0) {
        echo "ID no válido";
        exit;
    }

    $url = "http://localhost:8000/api/productos/$id";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpcode === 204) {
        echo "Producto eliminado con éxito.";
    } else {
        echo "Error al eliminar producto:<br>";
        echo "<pre>" . htmlspecialchars($response) . "</pre>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Producto</title>
</head>
<body>

<h2>Eliminar producto</h2>

<form method="post" action="">
    <label>ID del producto a eliminar: <input type="number" name="id" required></label><br><br>
    <button type="submit">Eliminar producto</button>
</form>

<a href="mostrarTodos.php">Volver al listado</a>

</body>
</html>
