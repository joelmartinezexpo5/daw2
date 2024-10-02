<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // Incluir la clase Monedero
        include 'Monedero.php';

        // Crear el primer monedero con una cantidad inicial
        $monedero1 = new Monedero(100);

        // Crear el segundo monedero con una cantidad inicial
        $monedero2 = new Monedero(200);

        // Mostrar el número de monederos creados
        echo "Número de monederos creados: " . Monedero::getNumeroMonederos() . "<br>";

        // Consultar el dinero disponible en el primer monedero
        echo "Dinero disponible en el monedero 1: " . $monedero1->consultarDisponible() . "€<br>";

        // Añadir 50€ al monedero 1
        $monedero1->meterDinero(50);
        echo "Después de añadir 50€, disponible en el monedero 1: " . $monedero1->consultarDisponible() . "€<br>";

        // Intentar sacar 200€ del monedero 1 (debería dar error)
        $monedero1->sacarDinero(200);

        // Sacar 80€ del monedero 1
        $monedero1->sacarDinero(80);
        echo "Después de sacar 80€, disponible en el monedero 1: " . $monedero1->consultarDisponible() . "€<br>";

        // Consultar el dinero disponible en el segundo monedero
        echo "Dinero disponible en el monedero 2: " . $monedero2->consultarDisponible() . "€<br>";

        // Destruir un monedero
        unset($monedero2);
        echo "Después de destruir el monedero 2, número de monederos creados: " . Monedero::getNumeroMonederos() . "<br>";
    ?>

</body>
</html>