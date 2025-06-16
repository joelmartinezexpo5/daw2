<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Editar Producto</title>
</head>
<body>
<h1>Formulario de edición</h1>

<form method="post" enctype="multipart/form-data">
    <label for="titulo">Título:<br>
        <input type="text" name="titulo" id="titulo" required value="<?= htmlspecialchars($_POST['titulo'] ?? '') ?>"><br>
    </label>
    <label for="descripcion">Descripción:<br>
        <textarea name="descripcion" id="descripcion" required><?= htmlspecialchars($_POST['descripcion'] ?? '') ?></textarea><br>
    </label>
    <label for="precio">Precio:<br>
        <input type="number" step="0.01" name="precio" id="precio" required value="<?= htmlspecialchars($_POST['precio'] ?? '') ?>"><br>
    </label>
    <label for="familia">Familia:<br>
        <select name="familia" id="familia" required>
            <option value="">--Selecciona familia--</option>
            <?php
            $familias = [
                1 => 'Bases de datos',
                2 => 'Seguridad informática',
                3 => 'Programación y desarrollo del software',
                4 => 'Redes y administración de sistemas',
                5 => 'Sistemas operativos',
                6 => 'Otros',
            ];
            foreach ($familias as $idFam => $nombreFam) {
                $selected = (isset($_POST['familia']) && $_POST['familia'] == $idFam) ? 'selected' : '';
                echo "<option value=\"$idFam\" $selected>$nombreFam</option>";
            }
            ?>
        </select><br>
    </label>
    <label for="imagen">Imagen (opcional para edición):<br>
        <input type="file" name="imagen" id="imagen" accept="image/*"><br>
    </label>
    <button type="submit">Actualizar Producto</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['slug'], $_POST['titulo'], $_POST['descripcion'], $_POST['precio'], $_POST['familia'])) {

    $slug = $_GET['slug'];

    $producto = [
        "titulo" => $_POST['titulo'],
        "descripcion" => $_POST['descripcion'],
        "precio" => $_POST['precio'],
        "familia_id" => $_POST['familia'],
    ];

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $producto["imagen"] = new CURLFile(
            $_FILES['imagen']['tmp_name'],
            mime_content_type($_FILES['imagen']['tmp_name']),
            $_FILES['imagen']['name']
        );
    }

    $curl = curl_init("http://localhost:8000/api/productos/$slug");
    curl_setopt_array($curl, [
        CURLOPT_CUSTOMREQUEST => "POST", // Cambiar a PUT si tu API lo acepta
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => $producto,
        CURLOPT_HTTPHEADER => [
            'Authorization: Bearer ' . ($_SESSION['token'] ?? ''),
            'Accept: application/json',
        ],
    ]);
    $respuesta_curl = curl_exec($curl);
    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $error_curl = curl_error($curl);
    curl_close($curl);

    $resultado = json_decode($respuesta_curl, true);

    if ($error_curl) {
        echo "<p>Error cURL: $error_curl</p>";
    } elseif ($http_code !== 200 && $http_code !== 204) {
        echo "<h3>Error al actualizar el producto</h3><p>Código HTTP: $http_code</p><pre>" . print_r($resultado ?: $respuesta_curl, true) . "</pre>";
    } else {
        header('Location: obtener.php?success=1');
        exit;
    }
}
?>
</body>
</html>
