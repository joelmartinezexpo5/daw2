<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $slug = $_GET['slug'] ?? '';
    if (empty($slug)) exit("Slug inválido.");
    if (!isset($_SESSION['token'])) exit("No estás autenticado.");

    $curl = curl_init("http://localhost:8000/api/productos/$slug");
    curl_setopt_array($curl, [
        CURLOPT_CUSTOMREQUEST => "DELETE",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Accept: application/json',
            "Authorization: Bearer {$_SESSION['token']}"
        ],
    ]);

    $response = curl_exec($curl);
    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    $data = json_decode($response);

    if ($http_code >= 400 || !$data || (isset($data->status) && $data->status === "error")) {
        exit("Error al borrar: " . ($data->message ?? "Error desconocido"));
    }

    header('Location: obtener.php?success=3');
    exit;
}
?>
