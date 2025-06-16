<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $url_servicio = "http://localhost:8001/api/productos/" . $id;

    $curl = curl_init($url_servicio);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta_curl = curl_exec($curl);

    if (curl_errno($curl)) {
        echo "Error al borrar el producto: " . curl_error($curl);
    } else {
        echo "<pre>Respuesta API: " . htmlspecialchars($respuesta_curl) . "</pre>";
    }

    curl_close($curl);
} else {
    echo "No se especificó ID del producto.";
}
?>

<a href="index.php">Volver al listado</a>
