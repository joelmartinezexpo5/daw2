<?php

$url_servicio = "http://localhost:8001/api/productos";

// Ruta local del archivo que quieres subir
$ruta_imagen = __DIR__ . '/imagen.jpg';

// Prepara el archivo para enviarlo con curl_file_create
$file = curl_file_create($ruta_imagen, mime_content_type($ruta_imagen), basename($ruta_imagen));

// Campos a enviar 
$postfields = [
    'nombre' => 'Producto con imagen',
    'descripcion' => 'Descripción subida con cURL',
    'precio' => '19.99',
    'imagen' => $file,
];

$curl = curl_init($url_servicio);

curl_setopt($curl, CURLOPT_POST, true); // método POST
curl_setopt($curl, CURLOPT_POSTFIELDS, $postfields);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$respuesta = curl_exec($curl);

if ($respuesta === false) {
    echo "Error cURL: " . curl_error($curl);
} else {
    echo "Respuesta API:\n";
    echo $respuesta;
}

curl_close($curl);