<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function obtenerFechaActual() {
            $fecha = new DateTime();
            $fecha->setTimezone(new DateTimeZone('Europe/Madrid'));
            return $fecha->format('l, d M Y');
        }

        include 'fecha.php';
        echo obtenerFechaActual();
    ?>
</body>
</html>