<?php
if($_REQUEST['numero']){
    echo '<h1>TABLA DE MULTIPLICAR DEL '.$_REQUEST['numero'].'</h1>';
    for($i=0; $i<=10; $i++){
        echo $_REQUEST['numero']. ' x ' .$i. ' = ' .$_REQUEST['numero'] * $i;
        echo '<br>';
    }

    echo '<br>';
    echo '<a href="ejercicio6.html">Volver</a>';
}