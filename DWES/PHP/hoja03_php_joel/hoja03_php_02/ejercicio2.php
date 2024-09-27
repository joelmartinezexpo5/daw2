<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function sumar($numero1, $numero2) {
            return $numero1 + $numero2;
        }
        
        $num1 = 5;
        $num2 = 10; 
        
        $resultado = sumar($num1, $num2);
        echo "<h2>La suma de $num1 y $num2 es: $resultado</h2>";
    ?>
</body>
</html>