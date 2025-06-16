<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Producto</title>
</head>

<body>
    <h1>Detalle del Producto</h1>

    <?php
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $url_servicio = "http://localhost:8001/api/productos/" . $id;
        $curl = curl_init($url_servicio);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta_curl = curl_exec($curl);
        curl_close($curl);

        $respuesta = json_decode($respuesta_curl);

        if ($respuesta && $respuesta->status != "error" && isset($respuesta->data[0])) {
            $producto = $respuesta->data[0];
            echo '<p><strong>Nombre:</strong> ' . htmlspecialchars($producto->titulo) . '</p>';
            echo '<p><strong>Precio:</strong> ' . htmlspecialchars($producto->precio) . '€</p>';
            echo '<p><strong>Descripción:</strong> ' . htmlspecialchars($producto->descripcion) . '</p>';
        } else {
            echo '<p style="color:red;">No se pudo obtener el producto.</p>';
        }
    } else {
        echo '<p style="color:red;">No se proporcionó ningún ID válido.</p>';
    }
    ?>

    <p><a href="index.php">← Volver al listado</a></p>
</body>

</html>