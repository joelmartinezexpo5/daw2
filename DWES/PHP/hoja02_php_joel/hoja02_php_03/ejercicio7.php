<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $a = 8;
        $b = 3;
        $c = 5;

        echo (($a == $b) && ($c > $b) ? 'true' : 'false') . "<br>";
        echo (($a == $b) || ($c > $b) ? 'true' : 'false') . "<br>";
        echo (($b <= $c) ? 'true' : 'false');
    ?>

</body>
</html>