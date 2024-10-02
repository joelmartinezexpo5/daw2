<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function ordenarArray($array) {
            sort($array); 
            return $array; 
        }

        function mezclarArrays($array1, $array2) {
            return array_merge($array1, $array2);
        }

        $array1 = [3, 8, 1, 9, 4, 5, 7, 2, 6, 10, 12, 11, 15, 13, 17, 16, 14, 20, 19, 18];
        $array2 = [25, 21, 24, 30, 29, 26, 28, 22, 23, 27, 31, 32, 34, 33, 35, 38, 36, 37, 39, 40];

        $array1Ordenado = ordenarArray($array1);
        $array2Ordenado = ordenarArray($array2);

        $arrayMezclado = mezclarArrays($array1Ordenado, $array2Ordenado);

        $arrayMezcladoOrdenado = ordenarArray($arrayMezclado);

        echo "Array 1 (ordenado): \n";
        print_r($array1Ordenado);

        echo "\nArray 2 (ordenado): \n";
        print_r($array2Ordenado);

        echo "\nArray Fusionado (mezclado y ordenado): \n";
        print_r($arrayMezcladoOrdenado);
    ?>
</body>
</html>