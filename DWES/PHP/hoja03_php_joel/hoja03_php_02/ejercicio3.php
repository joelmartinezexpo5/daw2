<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function imprimirMensaje($mensaje){
            echo $mensaje;
        }

        $mensaje = "Mensaje de prueba";

        imprimirMensaje($mensaje);

    ?>
</body>
</html>