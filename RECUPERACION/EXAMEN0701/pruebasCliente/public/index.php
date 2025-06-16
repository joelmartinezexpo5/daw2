<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>

<body>
    <h1>Productos</h1>
    <a href="crear.php">Crear producto</a>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>

        <?php
        $url_servicio = "http://localhost:8001/api/productos/listado";
        $curl = curl_init($url_servicio);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta_curl = curl_exec($curl);
        $productos = json_decode($respuesta_curl);

        foreach ($productos->data as $producto) {
            echo '<tr>
                <td>' . htmlspecialchars($producto->titulo) . '</td>
                <td>' . htmlspecialchars($producto->descripcion) . '</td>
                <td>' . htmlspecialchars($producto->precio) . '</td>
                <td>';
            if (!empty($producto->imagen)) {
                echo '<img src="http://localhost:8001/' . htmlspecialchars($producto->imagen) . '" alt="Imagen" width="100">';
            } else {
                echo 'Sin imagen';
            }
            echo '</td>

                <td><a href="get.php?id=' . $producto->id . '">Ver</a></td>
                <td><a href="update.php?id=' . $producto->id . '">Editar</a></td>
                <td><a href="delete.php?id=' . $producto->id . '">Eliminar</a></td>
            </tr>';
        }

        curl_close($curl);
        ?>
    </table>
</body>

</html>