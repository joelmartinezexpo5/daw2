<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $nombre = "Joel";
        echo "Informacion de la variable 'nombre': ";
        echo var_dump($nombre)."<br>";
        echo "Contenido de la variable: $nombre <br>";
        $nombre = NULL;
        echo "Despues de asignarle un valor nulo: ";
        echo var_dump($nombre);
    ?>
</body>
</html>