<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $cantidad = 67;

        $billetes10 = 0;
        $billetes5 = 0;
        $monedas1 = 0;

        if ($cantidad >= 10) {
            $billetes10 = (int)($cantidad / 10);
            $cantidad = $cantidad % 10;
        }

        if ($cantidad >= 5) {
            $billetes5 = (int)($cantidad / 5);
            $cantidad = $cantidad % 5;
        }

        $monedas1 = $cantidad;

        echo "Desglose de la cantidad: <br>";
        echo "Billetes de 10€: $billetes10 <br>";
        echo "Billetes de 5€: $billetes5 <br>";
        echo "Monedas de 1€: $monedas1 <br>";
    ?>
</body>
</html>