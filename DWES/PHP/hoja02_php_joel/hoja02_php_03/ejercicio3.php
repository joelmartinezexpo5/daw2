<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $fechaDada = '31-09-2023';
        $valida = DateTime::createFromFormat('d-m-Y', $fechaDada) && DateTime::getLastErrors()['error_count'] == 0;
        echo $valida ? "La fecha $fechaDada es válida.\n" : "La fecha $fechaDada no es válida.\n";
    ?>

</body>
</html>