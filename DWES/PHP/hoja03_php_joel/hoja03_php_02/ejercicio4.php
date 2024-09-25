<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function interesSimple($capital, $tasa, $tiempo) {
            return $capital * ($tasa / 100) * $tiempo;
        }
        
        function interesCompuesto($capital, $tasa, $tiempo) {
            return $capital * pow((1 + $tasa / 100), $tiempo) - $capital;
        }
        
        $capital = 1000; // Capital inicial
        $tasa = 5; // Tasa de interés en porcentaje
        $tiempo = 3; // Tiempo en años
        
        $interesSimple = interesSimple($capital, $tasa, $tiempo);
        $interesCompuesto = interesCompuesto($capital, $tasa, $tiempo);
        
        echo "<h2>Cálculo de Intereses</h2>";
        echo "Interés Simple: $interesSimple €<br>";
        echo "Interés Compuesto: $interesCompuesto €<br>";
        
        if ($interesCompuesto > $interesSimple) {
            echo "El interés compuesto es más beneficioso.";
        } else {
            echo "El interés simple es más beneficioso.";
        }
        ?>
        
        </body>
        </html>
        
    ?>
</body>
</html>