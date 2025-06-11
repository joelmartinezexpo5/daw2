<?php
// mostrarUno.php

if (!isset($_GET['id'])) {
    echo "ID de producto no especificado.";
    exit;
}

$id = intval($_GET['id']);
$url = "http://localhost:8000/api/productos/$id";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

$productoData = json_decode($response, true);

if (!$productoData || isset($productoData['message'])) {
    echo "Producto no encontrado.";
    exit;
}

$producto = $productoData['data'] ?? $productoData;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Detalle Producto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 40px auto;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px 15px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            width: 30%;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>

<body>

    <h2>Detalle del Producto</h2>

    <table>
        <tr>
            <th>ID</th>
            <td><?= htmlspecialchars($producto['id']) ?></td>
        </tr>
        <tr>
            <th>Nombre</th>
            <td><?= htmlspecialchars($producto['nombre']) ?></td>
        </tr>
        <tr>
            <th>Descripción</th>
            <td><?= htmlspecialchars($producto['descripcion']) ?></td>
        </tr>
        <tr>
            <th>Precio</th>
            <td><?= htmlspecialchars($producto['precio']) ?> €</td>
        </tr>
        <tr>
            <th>Stock</th>
            <td><?= htmlspecialchars($producto['stock']) ?></td>
        </tr>
        <tr>
            <th>Categoría</th>
            <td><?= htmlspecialchars($producto['categoria']['nombre'] ?? 'Sin categoría') ?></td>
        </tr>
        <tr>
            <th>Imagen</th>
            <td>
                <?php if (!empty($producto['url_imagen'])): ?>
                    <img src="<?= htmlspecialchars($producto['url_imagen']) ?>"
                        alt="<?= htmlspecialchars($producto['nombre']) ?>" width="80">
                <?php else: ?>
                    Sin imagen
                <?php endif; ?>
            </td>
        </tr>
    </table>

    <a href="mostrarTodos.php">Volver al listado</a>

</body>

</html>