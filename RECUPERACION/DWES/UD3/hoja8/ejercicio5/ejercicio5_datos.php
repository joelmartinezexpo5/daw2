<?php
if($_REQUEST['numero'] % 2 == 0){
    echo 'El numero '.$_REQUEST['numero'].' es par';
}else {
    echo 'El numero '.$_REQUEST['numero'].' es impar';
}

echo '<br>';
echo '<a href="index.php">Volver a inicio<a>';