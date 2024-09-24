<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $sumaPares = 0;
        for ($i = 10; $i <= 100; $i += 2) {
            $sumaPares += $i;
        }
        echo $sumaPares . "<br><br>";
    ?>
</body>
</html>