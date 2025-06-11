<?php
$id = 1; // Cambia el ID según lo que tengas en tu base de datos
$url = "http://localhost:8000/api/productos/$id";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

echo "<pre>";
print_r(json_decode($response, true));
echo "</pre>";
