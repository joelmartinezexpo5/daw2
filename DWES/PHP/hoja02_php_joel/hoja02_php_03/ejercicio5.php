<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $horasASumar = 5;

        $fecha = new DateTime();
        $fecha->modify("+$horasASumar hours");

        echo "La nueva fecha y hora es: " . $fecha->format('d-m-Y H:i:s');
    ?>



</body>
</html>