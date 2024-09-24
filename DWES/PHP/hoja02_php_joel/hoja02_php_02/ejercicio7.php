<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $a = 20;
        $b = 15;

        echo "Valores originales: a = $a y b = $b <br>";

        $temp = $a;
        $a = $b;
        $b = $temp;

        echo "Valores intercambiados: a = $a y b = $b";
    ?>
</body>
</html>