<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // Array de verbos regulares
        $verbos = ["hablar", "comer", "vivir"];

        // Elegir un verbo al azar
        $verbo = $verbos[array_rand($verbos)];

        // Función para conjugar el verbo en presente de indicativo
        function conjugarPresente($verbo) {
            $raiz = substr($verbo, 0, -2); // Obtenemos la raíz del verbo
            $terminacion = substr($verbo, -2); // Obtenemos la terminación del verbo (-ar, -er, -ir)

            // Definir las terminaciones para los verbos en presente de indicativo
            $terminaciones = [];

            if ($terminacion == "ar") {
                $terminaciones = ["o", "as", "a", "amos", "áis", "an"];
            } elseif ($terminacion == "er") {
                $terminaciones = ["o", "es", "e", "emos", "éis", "en"];
            } elseif ($terminacion == "ir") {
                $terminaciones = ["o", "es", "e", "imos", "ís", "en"];
            }

            // Imprimir las conjugaciones
            $personas = ["yo", "tú", "él/ella/usted", "nosotros/nosotras", "vosotros/vosotras", "ellos/ellas/ustedes"];
            for ($i = 0; $i < count($terminaciones); $i++) {
                echo $personas[$i] . " " . $raiz . $terminaciones[$i] . "<br>";
            }
        }

        // Ejemplo de uso
        echo "Verbo elegido: $verbo<br>";
        conjugarPresente($verbo);
    ?>

</body>
</html>