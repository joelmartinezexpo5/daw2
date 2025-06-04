<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Crear producto</title>
</head>

<body>

    <h1>Crear Producto</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'] ?? '';
        $descripcion = $_POST['descripcion'] ?? '';
        $precio = $_POST['precio'] ?? '';

        // Preparar datos para enviar con cURL
        $datos = [
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio' => $precio,
        ];

        $curl = curl_init('http://localhost:8001/api/productos/');
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($datos));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        echo '<h2>Respuesta API:</h2>';
        echo '<pre>' . htmlspecialchars($respuesta) . '</pre>';
    }
    ?>

    <form method="POST">
        <label>Nombre: <input type="text" name="nombre" required></label><br>
        <label>Descripción: <input type="text" name="descripcion" required></label><br>
        <label>Precio: <input type="number" step="0.01" name="precio" required></label><br>
        <button type="submit">Crear</button>
    </form>

</body>

</html>