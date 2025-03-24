<?php
if($_REQUEST['menor'] && $_REQUEST['mayor']){
    $menor = $_REQUEST['menor'];
    $mayor = $_REQUEST['mayor'];
    echo 'LISTA DE PARES DE NUMEROS DE ' .$menor. ' Y ' .$mayor. ':<br>';
    for ($i = $menor, $j = $mayor; $i <= $mayor; $i++, $j--) {
        echo "($i, $j)";
    }

    echo '<br>';
    echo '<a href="ejercicio7.html">Volver</a>';
}