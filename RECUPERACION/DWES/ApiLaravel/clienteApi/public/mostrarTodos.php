<?php
$url = "http://localhost:8000/api/productos";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

$decodedResponse = json_decode($response, true);

// Accedemos correctamente a los productos
$productos = $decodedResponse['data'] ?? [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Productos</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 30px auto;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

<h2>Listado de Productos</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Categoría</th>
    </tr>
    <?php foreach ($productos as $producto): ?>
        <tr>
            <td><?= htmlspecialchars($producto['id']) ?></td>
            <td><?= htmlspecialchars($producto['nombre']) ?></td>
            <td><?= htmlspecialchars($producto['descripcion']) ?></td>
            <td><?= htmlspecialchars($producto['precio']) ?> €</td>
            <td><?= htmlspecialchars($producto['stock']) ?></td>
            <td><?= htmlspecialchars($producto['categoria_id']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
