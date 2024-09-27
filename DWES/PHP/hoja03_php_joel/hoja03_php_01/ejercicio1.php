<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        $fecha = new DateTime();
        $fecha->setTimezone(new DateTimeZone('Europe/Madrid'));
        
        echo $fecha->format('l, d M Y');
    ?>
</body>
</html>

 