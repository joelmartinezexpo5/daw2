<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // Incluir la clase Circulo
        include 'Circulo.php';

        // Crear un objeto de tipo Circulo usando el constructor
        $miCirculo = new Circulo(5);

        // Mostrar el valor inicial del radio usando el método getRadio
        echo "El radio inicial es: " . $miCirculo->getRadio() . "<br>";

        // Modificar el valor del radio usando el método setRadio
        $miCirculo->setRadio(10);
        echo "El radio modificado es: " . $miCirculo->getRadio() . "<br>";

        // Usar el método mágico __set para cambiar el radio
        $miCirculo->__set('radio', 15);
        echo "El radio después de usar __set es: " . $miCirculo->__radio . "<br>";

        // Usar el método mágico __get para obtener el valor del radio
        echo "El radio obtenido con __get es: " . $miCirculo->__get('radio') . "<br>";
    ?>
</body>
</html>