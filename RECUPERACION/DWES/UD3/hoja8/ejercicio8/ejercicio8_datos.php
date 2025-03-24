<?php
if (isset($_POST['num1']) && isset($_POST['num2']) && isset($_POST['operacion'])) {
    $num1 = intval($_POST['num1']);
    $num2 = intval($_POST['num2']);
    $operacion = $_POST['operacion'];
    $resultado = 0;

    switch ($operacion) {
        case 'suma':
            $resultado = $num1 + $num2;
            $operacionTexto = "Suma";
            break;
        case 'resta':
            $resultado = $num1 - $num2;
            $operacionTexto = "Resta";
            break;
        case 'producto':
            $resultado = $num1 * $num2;
            $operacionTexto = "Producto";
            break;
        case 'cociente':
            if ($num2 != 0) {
                $resultado = $num1 / $num2;
                $operacionTexto = "Cociente";
            } else {
                echo "Error: No se puede dividir por 0.";
                echo '<br><a href="ejercicio8.html">Volver</a>';
                exit;
            }
            break;
        default:
            echo "Operación no válida.";
            echo '<br><a href="ejercicio8.html">Volver</a>';
            exit;
    }

    echo "<h2>Resultado de la operación</h2>";
    echo "La operación seleccionada fue: <strong>$operacionTexto</strong><br>";
    echo "El resultado de $num1 y $num2 es: <strong>$resultado</strong><br>";
    echo '<br><a href="ejercicio8.html">Volver</a>';
} else {
    echo "Por favor, completa todos los campos.";
    echo '<br><a href="ejercicio8.html">Volver</a>';
}
?>
