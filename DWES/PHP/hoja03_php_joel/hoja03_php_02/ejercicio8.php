<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // 1. Crea una variable y asígnale el valor "Comer algas es realmente sano".
        $cadena = "Comer algas es realmente sano";

        // 2. Determina la posición de la palabra "algas" en la cadena.
        $posicion = strpos($cadena, "algas");
        echo "La posición de la palabra 'algas' es: $posicion\n";

        // 3. Reemplaza la palabra "realmente" por la palabra "muy".
        $cadenaReemplazada = str_replace("realmente", "muy", $cadena);
        echo "Cadena después de reemplazar: $cadenaReemplazada\n";

        // 4. Comprueba si en la cadena existe la palabra "anacardo".
        $existeAnacardo = strpos($cadena, "anacardo") !== false ? "Sí" : "No";
        echo "¿La palabra 'anacardo' existe en la cadena? $existeAnacardo\n";

        // 5. Invierte el orden del texto.
        $cadenaInvertida = strrev($cadena);
        echo "Cadena invertida: $cadenaInvertida\n";

        // 6. Cuenta cuántas vocales "e" hay en la cadena.
        $cantidadE = substr_count($cadena, "e");
        echo "Cantidad de vocales 'e': $cantidadE\n";
    ?>

</body>
</html>