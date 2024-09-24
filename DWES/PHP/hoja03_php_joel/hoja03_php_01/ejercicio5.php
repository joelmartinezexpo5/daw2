<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        for ($i = 100; $i <= 999; $i++) {
            $d1 = (int)($i / 100);
            $d2 = (int)(($i / 10) % 10);
            $d3 = (int)($i % 10);
            if ($d1 + $d2 + $d3 == $d1 * $d2 * $d3) {
                echo "$i<br>";
            }
        }
        echo "<br>";
    ?>
</body>
</html>