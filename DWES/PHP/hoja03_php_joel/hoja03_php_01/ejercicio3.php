<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function esCapicua($numero) {
            return strval($numero) === strrev($numero);
        }
        $numero = 121;
        echo esCapicua($numero) ? "Sí" : "No";
        echo "<br><br>";      
    ?>
</body>
</html>