<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $directorioSubida = "images/";
    
    if (!file_exists($directorioSubida)) {
        mkdir($directorioSubida);
    }
    
    $nombre = $_POST["name"];
    $extensionArchivo = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
    $nombreArchivo = $nombre . "." . $extensionArchivo;
    $rutaArchivo = $directorioSubida . $nombreArchivo;
    
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $rutaArchivo)) {
        echo "Archivo subido con éxito como $nombreArchivo.";
    } else {
        echo "Error al subir el archivo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Archivo</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Nombre:</label>
        <input type="text" name="name" required>
        <br>
        <label>Archivo:</label>
        <input type="file" name="file" required>
        <br>
        <input type="submit" value="Subir">
    </form>
</body>
</html>
