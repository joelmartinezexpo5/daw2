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
        
        function redondearNumero($numero) {
            return round($numero);
        }
        
        function contarDigitos($numero) {
            return strlen(strval(abs($numero))); 
        }
        
        $numero = 12321;
        
        $esCapicua = esCapicua($numero);
        $numeroRedondeado = redondearNumero($numero);
        $numeroDigitos = contarDigitos($numero);
        
        echo "<h2>Comprobaciones del número: $numero</h2>";
        echo "¿Es capicúa? " . ($esCapicua ? "Sí" : "No") . "<br>";
        echo "Número redondeado: $numeroRedondeado<br>";
        echo "Número de dígitos: $numeroDigitos<br>";
    ?>
</body>
</html>