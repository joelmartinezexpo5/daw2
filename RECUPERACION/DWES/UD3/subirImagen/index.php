<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $directorioSubida = "images/";
    
    $nombre = $_POST["nombre"];
    $extensionArchivo = pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);
    $nombreArchivo = $nombre . "." . $extensionArchivo;
    $rutaArchivo = $directorioSubida . $nombreArchivo;
    
    if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $rutaArchivo)) {
        echo "Archivo subido con éxito como $nombreArchivo.";
    } else {
        echo "Error al subir el archivo.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        <br>
        <label>Archivo:</label>
        <input type="file" name="archivo" required>
        <br>
        <input type="submit" value="Subir">
    </form>
    <?php
    $archivos = array_diff(scandir('images/'), array('.','..'));
    if(count($archivos) > 0){
        foreach($archivos as $archivo){
            $extension = pathinfo($archivo, PATHINFO_EXTENSION); 
            if($extension == 'jpeg' || $extension == 'jpg' || $extension == 'png'){
                echo "<h1>{$archivo}</h1>";
                echo "<img src='images/{$archivo}' width='300' height='100px'><br>";
            }else{
                echo "<h1>{$archivo}</h1>";
                echo "<a href=images/{$archivo} download={$archivo}>Descargar archivo</a>";
            }
        }
    }
    ?>
</body>
</html>
