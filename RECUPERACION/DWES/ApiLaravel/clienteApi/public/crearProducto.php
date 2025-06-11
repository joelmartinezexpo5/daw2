<?php
// crearProducto.php

$apiUrl = "http://localhost:8000/api/productos";

$mensaje = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = $_POST['nombre'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $precio = $_POST['precio'] ?? '';
    $stock = $_POST['stock'] ?? '';
    $categoria_id = $_POST['categoria_id'] ?? null;

    // Procesar imagen localmente (temporalmente)
    $imagenRuta = null;
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $tmpNombre = $_FILES['imagen']['tmp_name'];
        $nombreOriginal = basename($_FILES['imagen']['name']);

        // Guardamos la imagen en carpeta temporal para enviarla con CURLFile
        $uploadsDir = __DIR__ . '/uploads/';
        if (!is_dir($uploadsDir)) {
            mkdir($uploadsDir, 0777, true);
        }

        $imagenRuta = $uploadsDir . uniqid() . '_' . $nombreOriginal;

        if (!move_uploaded_file($tmpNombre, $imagenRuta)) {
            $error = "Error al subir la imagen al servidor local.";
        }
    }

    if (!$error) {
        // Preparar datos para enviar
        $postFields = [
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'stock' => $stock,
            'categoria_id' => $categoria_id,
        ];

        if ($imagenRuta) {
            $postFields['imagen'] = new CURLFile($imagenRuta);
        }

        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        // No establezcas Content-Type explícitamente con CURLFile

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // Elimina la imagen temporal local después de enviar
        if ($imagenRuta && file_exists($imagenRuta)) {
            unlink($imagenRuta);
        }

        if ($httpCode == 201) {
            $mensaje = "Producto creado con éxito.";
        } else {
            $error = "Error al crear producto. Respuesta API: " . $response;
        }
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

<h1>Crear Producto</h1>

<?php if ($mensaje): ?>
    <p style="color:green;"><?= htmlspecialchars($mensaje) ?></p>
<?php endif; ?>

<?php if ($error): ?>
    <p style="color:red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form action="crearProducto.php" method="post" enctype="multipart/form-data">
    <label for="nombre">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre" maxlength="100" required><br><br>

    <label for="descripcion">Descripción:</label><br>
    <textarea id="descripcion" name="descripcion"></textarea><br><br>

    <label for="precio">Precio:</label><br>
    <input type="number" step="0.01" min="0" id="precio" name="precio" required><br><br>

    <label for="stock">Stock:</label><br>
    <input type="number" min="0" id="stock" name="stock" required><br><br>

    <label for="categoria_id">Categoría (ID):</label><br>
    <input type="number" min="1" id="categoria_id" name="categoria_id"><br><br>

    <label for="imagen">Imagen:</label><br>
    <input type="file" id="imagen" name="imagen" accept="image/*"><br><br>

    <button type="submit">Crear Producto</button>
</form>

<a href="mostrarTodos.php">Volver al listado</a>

</body>
</html>
