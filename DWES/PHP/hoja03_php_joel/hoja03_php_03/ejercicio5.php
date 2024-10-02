<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // Definimos el array de artículos
        $articulos = [
            ["codigo" => 1, "descripcion" => "Artículo 1", "existencias" => 100],
            ["codigo" => 2, "descripcion" => "Artículo 2", "existencias" => 50],
            ["codigo" => 3, "descripcion" => "Artículo 3", "existencias" => 200]
        ];

        // Función que proporciona el nombre del artículo con mayor número de existencias
        function mayor($articulos) {
            $mayor = $articulos[0];
            foreach ($articulos as $articulo) {
                if ($articulo['existencias'] > $mayor['existencias']) {
                    $mayor = $articulo;
                }
            }
            return $mayor['descripcion'];
        }

        // Función que suma todas las existencias
        function sumar($articulos) {
            $suma = 0;
            foreach ($articulos as $articulo) {
                $suma += $articulo['existencias'];
            }
            return $suma;
        }

        // Función que muestra el contenido del array
        function mostrar($articulos) {
            foreach ($articulos as $articulo) {
                echo "Código: " . $articulo['codigo'] . ", Descripción: " . $articulo['descripcion'] . ", Existencias: " . $articulo['existencias'] . "<br>";
            }
        }

        // Ejemplo de uso
        echo "Artículo con mayor número de existencias: " . mayor($articulos) . "<br>";
        echo "Suma total de existencias: " . sumar($articulos) . "<br>";
        echo "Contenido del array de artículos:<br>";
        mostrar($articulos);
    ?>

</body>
</html>