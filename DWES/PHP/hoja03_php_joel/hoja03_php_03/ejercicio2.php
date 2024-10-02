<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function desgloseMoneda($cantidad){
            $unidadesMonetarias = array(500,200, 100, 50, 20, 10, 5, 2, 1, 0.50, 0.20, 0.10, 0.05, 0.02, 0.01);

            $resultado = array();

            foreach($unidadesMonetarias as $unidad){
                if($cantidad >= $unidad){
                    $resultado[$unidad] = floor($cantidad / $unidad);
                    $cantidad = round($cantidad % $unidad, 2);
                }
            }

            echo "Desglose de la cantidad:\n";
            foreach ($resultado as $unidad => $cantidadUnidades) {
                if ($unidad >= 5) {
                    echo "$cantidadUnidades billete(s) de €$unidad\n";
                } else {
                    echo "$cantidadUnidades moneda(s) de €$unidad\n";
                }
            }
        }

        $cantidad = 1234.67;
        desgloseMoneda($cantidad);
    ?>
</body>
</html>