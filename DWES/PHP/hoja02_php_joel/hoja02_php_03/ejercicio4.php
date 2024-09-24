<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $fechaInicio = "2023-01-01";
        $fechaFin = "2024-09-23";
        
        $fecha1 = new DateTime($fechaInicio);
        $fecha2 = new DateTime($fechaFin);
        
        $diferencia = $fecha1->diff($fecha2);
        
        echo "Días transcurridos: " . $diferencia->days;
    ?>

</body>
</html>