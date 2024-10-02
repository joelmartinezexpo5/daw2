<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // Incluir la clase Coche
        include 'Coche.php';

        // Crear un objeto de tipo Coche
        $miCoche = new Coche("1234-ABC", 50);

        // Mostrar el estado inicial del coche
        echo "Estado inicial del coche:<br>";
        $miCoche->mostrar();

        // Acelerar el coche en 30 km/h
        $miCoche->acelera(30);
        echo "<br>Después de acelerar 30 km/h:<br>";
        $miCoche->mostrar();

        // Intentar acelerar el coche en 50 km/h (lo que debería limitar la velocidad a 120 km/h)
        $miCoche->acelera(50);
        echo "<br>Después de intentar acelerar 50 km/h (límite de 120 km/h):<br>";
        $miCoche->mostrar();

        // Frenar el coche en 100 km/h
        $miCoche->frena(100);
        echo "<br>Después de frenar 100 km/h:<br>";
        $miCoche->mostrar();

        // Intentar frenar el coche en 10 km/h más (lo que debería dejar la velocidad en 0)
        $miCoche->frena(10);
        echo "<br>Después de intentar frenar 10 km/h más (límite de 0 km/h):<br>";
        $miCoche->mostrar();
    ?>

</body>
</html>