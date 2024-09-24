<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        setlocale(LC_TIME, 'es_ES.UTF-8');
        echo strftime("%A, %d de %B de %Y") . "<br><br>";
    ?>
</body>
</html>