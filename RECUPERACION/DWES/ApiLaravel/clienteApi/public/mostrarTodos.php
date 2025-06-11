<?php
$url = "http://localhost:8000/api/productos";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

$decodedResponse = json_decode($response, true);

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

        th,
        td {
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

    <p style="text-align:center;">
        <a href="crearProducto.php">Crear nuevo producto</a>
    </p>


    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Categoría</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?= htmlspecialchars($producto['id']) ?></td>
                <td><?= htmlspecialchars($producto['nombre']) ?></td>
                <td><?= htmlspecialchars($producto['descripcion']) ?></td>
                <td><?= htmlspecialchars($producto['precio']) ?> €</td>
                <td><?= htmlspecialchars($producto['stock']) ?></td>
                <td><?= htmlspecialchars($producto['categoria']['nombre'] ?? 'Sin categoría') ?></td>
                <td>
                    <?php if (!empty($producto['url_imagen'])): ?>
                        <img src="<?= htmlspecialchars($producto['url_imagen']) ?>"
                            alt="<?= htmlspecialchars($producto['nombre']) ?>" width="80">
                    <?php else: ?>
                        Sin imagen
                    <?php endif; ?>
                </td>
                <td>
                    <a href="mostrarUno.php?id=<?= urlencode($producto['id']) ?>">Ver</a>

                    <form action="eliminarProducto.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($producto['id']) ?>">
                        <button type="submit" style="color:red;">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>