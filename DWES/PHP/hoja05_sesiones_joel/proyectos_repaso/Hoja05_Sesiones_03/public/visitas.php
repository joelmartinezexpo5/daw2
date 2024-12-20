<?php
session_start();
//? Definimos o actualizamos el instante de acceso 
$fechaActual = date('d-m-Y H:i:s');
$instanteAnterior = isset($_SESSION['instante']) ? $_SESSION['instante'] : 'No se tiene registro de la última visita';
$_SESSION['instante'] = $fechaActual;
//? Definimos el contador
if (isset($_SESSION['contador'])){
     $_SESSION['contador']++;
     $contador = $_SESSION['contador'];
} else {
    $_SESSION['contador'] = 0;
    $contador = 'Primera vez';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Visitas</title>
</head>

<body class="container">
    <h1>Sesiones</h1>
    <hr>
<!-- Si la sesion ya se ha registrado, que se vaya incrementando, sino que se inicialice en 1 -->
    <h4>Número de veces accedidas a esta página: <?php echo $contador ?></h4>
    <hr>
    <h4>Instante en el que se accedió a esta página: <?php echo $instanteAnterior?></h4>


</body>

</html>