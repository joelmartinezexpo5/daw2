<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function calcularLetraNIF($dni) {
            $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
            $resto = $dni % 23;
            return $letras[$resto];
        }

        $dni = 72351728;
        $letra = calcularLetraNIF($dni);
        echo "La letra del NIF correspondiente al DNI $dni es: $letra";
    ?>

</body>
</html>