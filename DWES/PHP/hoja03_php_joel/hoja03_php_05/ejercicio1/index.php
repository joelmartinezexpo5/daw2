<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include 'Empleado.php';
        include 'Encargado.php';

        $Empleado1 = new Empleado(sueldoBase:1000);
        echo "Sueldo de empleado: ". $Empleado1->getSueldoBase(). "\n";

        $Encargado1 = new Encargado(sueldoBase:1000);
        echo "Sueldo de encargado: ". $Encargado1->getSueldo(). "\n"
    ?>
</body>
</html>