<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $temporal = "juan";
        echo gettype($temporal)."<br>";
        $temporal = 3.14;
        echo gettype($temporal)."<br>";
        $temporal = false;
        echo gettype($temporal)."<br>";
        $temporal = 3;
        echo gettype($temporal)."<br>";
        $temporal = NULL;
        echo gettype($temporal);
    ?>
</body>
</html>