<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['slug'])) {
    $slug = $_GET['slug'];

    // Opcional: limpiar/escapar slug para URL
    $slug = urlencode($slug);

    $url_servicio = "http://localhost:8000/api/productos/" . $slug;
    $curl = curl_init($url_servicio);

    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, ['Accept: application/json']);

    $respuesta_curl = curl_exec($curl);
    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    $respuesta = json_decode($respuesta_curl);

    if ($http_code === 200 && isset($respuesta->data)) {
        $producto = $respuesta->data;

        echo "<h1>Producto: {$producto->titulo}</h1>";
        echo "<p><strong>Precio:</strong> {$producto->precio}</p>";
        echo "<p><strong>Descripción:</strong> {$producto->descripcion}</p>";

        if (!empty($producto->imagen) && !empty($producto->imagen->url)) {
            echo "<p><img src=\"http://localhost:8000/{$producto->imagen->url}\" alt=\"Imagen del producto\" style=\"max-height:200px;\"></p>";
        } else {
            echo "<p>Sin imagen</p>";
        }

        echo '<p><a href="obtener.php">← Volver a la lista de productos</a></p>';
    } else {
        echo "<p>No se pudo obtener el producto con slug '{$slug}'. Mensaje: " . ($respuesta->message ?? 'Error desconocido') . "</p>";
    }
} else {
    echo "<p>No se especificó slug.</p>";
}
?>
