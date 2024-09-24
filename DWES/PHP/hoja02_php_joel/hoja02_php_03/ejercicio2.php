<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $fechaActual = new DateTime();
        $diasRestar = 10;
        $fechaActual->modify("-$diasRestar days");
        echo "Fecha con $diasRestar días restados: " . $fechaActual->format('Y-m-d') . "\n";
    ?>

</body>
</html>