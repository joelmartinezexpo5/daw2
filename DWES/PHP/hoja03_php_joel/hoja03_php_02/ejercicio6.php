<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function validarFecha($fecha) {
            $fechaFormato = DateTime::createFromFormat('Y-m-d', $fecha);
            return $fechaFormato && $fechaFormato->format('Y-m-d') === $fecha;
        }
        
        $fecha = "2024-09-25";
        
        if (validarFecha($fecha)) {
            echo "<h2>La fecha $fecha es válida.</h2>";
        } else {
            echo "<h2>La fecha $fecha no es válida.</h2>";
        }
        ?>
</body>
</html>