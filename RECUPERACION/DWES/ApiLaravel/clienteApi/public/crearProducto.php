<?php
$url = "http://localhost:8000/api/productos";

$data = [
    "nombre" => "Producto Nuevo",
    "descripcion" => "Descripción del producto",
    "precio" => 19.99,
    "stock" => 10,
    "categoria_id" => 1 // Asegúrate de tener una categoría con ID 1
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

echo "Producto creado: ";
print_r($response);
