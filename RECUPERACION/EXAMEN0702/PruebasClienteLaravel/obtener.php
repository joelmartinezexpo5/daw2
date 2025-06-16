<h1>Productos</h1>
<p><a href="crear.php">Crear nuevo producto</a></p>
<p><a href="login.php">Iniciar sesión</a></p>

<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Imagen</th>
        <th>Acciones</th>
    </tr>
    <?php
    $url_servicio = "http://localhost:8000/api/productos";
    $curl = curl_init($url_servicio);

    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, ['Accept: application/json']);

    $respuesta_curl = curl_exec($curl);
    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    $productos = json_decode($respuesta_curl);

    if ($http_code !== 200 || $productos->data==[]) {
        echo "<tr><td colspan='5'>Error: No se pudo obtener la lista de productos.</td></tr>";
    } else {
        foreach ($productos->data as $producto) {
            echo '<tr>
                    <td>' .$producto->titulo . '</td>
                    <td>' . $producto->descripcion . '</td>
                    <td>' . $producto->precio . '</td>
                    <td>';
            if (!empty($producto->imagen->url)) {
                echo '<img src="http://localhost:8000/'.$producto->imagen->url . '" alt="Imagen del producto" style="max-height:100px;">';
            } else {
                echo 'Sin imagen';
            }
            echo '</td>
                    <td>
                       <a href="get.php?slug='.$producto->slug.'">Ver</a> |
                        <a href="actualizar.php?slug=' . $producto->slug . '">Actualizar</a> |
                        <a href="eliminar.php?slug=' . $producto->slug . '" onclick="return confirm(\'¿Estás seguro de que quieres eliminar este producto?\')">Eliminar</a>
                    </td>
                  </tr>';
        }
    }
    ?>
</table>
