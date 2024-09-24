<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        for ($i = 3; $i <= 999; $i++) {
            $esPrimo = true;
            for ($j = 2; $j <= sqrt($i); $j++) {
                if ($i % $j == 0) {
                    $esPrimo = false;
                    break;
                }
            }
            if ($esPrimo) {
                echo "$i<br>";
            }
        }
    ?>
</body>
</html>