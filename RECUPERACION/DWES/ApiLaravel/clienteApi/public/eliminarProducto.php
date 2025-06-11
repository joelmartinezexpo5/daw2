<?php
$id = 1; // Cambia el ID a eliminar
$url = "http://localhost:8000/api/productos/$id";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

echo "Producto eliminado: ";
print_r($response);
