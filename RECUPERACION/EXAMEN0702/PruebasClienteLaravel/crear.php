<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['titulo'], $_POST['descripcion'], $_POST['precio'], $_POST['familia'])) {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $familia = $_POST['familia'];

    $cfile = null;
    if (!empty($_FILES['imagen']['tmp_name']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $cfile = new CURLFile(
            $_FILES['imagen']['tmp_name'],
            mime_content_type($_FILES['imagen']['tmp_name']),
            $_FILES['imagen']['name']
        );
    }

    $data = [
        "titulo" => $titulo,
        "descripcion" => $descripcion,
        "precio" => $precio,
        "familia_id" => $familia,
    ];

    if ($cfile) {
        $data['imagen'] = $cfile;
    }

    $curl = curl_init("http://localhost:8000/api/productos");
    curl_setopt_array($curl, [
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => [
            'Authorization: Bearer ' . ($_SESSION['token'] ?? ''),
            'Accept: application/json',
        ],
    ]);

    $response = curl_exec($curl);
    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $error = curl_error($curl);
    curl_close($curl);

    if ($error) {
        echo "<p>Error cURL: $error</p>";
    } elseif ($http_code !== 201) {
        echo "<p>Error al guardar el producto. HTTP code: $http_code</p>";
        echo "<pre>$response</pre>";
    } else {
        header('Location: obtener.php?success=2');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Producto</title>
</head>
<body>

<form method="post" enctype="multipart/form-data">
    <input type="text" name="titulo" placeholder="Título" required><br>
    <textarea name="descripcion" placeholder="Descripción" required></textarea><br>
    <input type="number" step="0.01" name="precio" placeholder="Precio" required><br>
    <select name="familia" required>
        <option value="">--Selecciona familia--</option>
        <option value="1">Bases de datos</option>
        <option value="2">Seguridad informática</option>
        <option value="3">Programación y desarrollo del software</option>
        <option value="4">Redes y administración de sistemas</option>
        <option value="5">Sistemas operativos</option>
        <option value="6">Otros</option>
    </select><br>
    <input type="file" name="imagen" accept="image/*"><br>
    <button type="submit">Crear Producto</button>
</form>

</body>
</html>
