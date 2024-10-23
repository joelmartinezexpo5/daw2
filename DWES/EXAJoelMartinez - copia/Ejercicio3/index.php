<?php
    require_once 'vendor/autoload.php';

    $faker = Faker\Factory::create('es_ES');

    if(isset($_GET['numNombre'])){
        echo '<h2>Resultados</h2>';
        echo '<h3>Nombres</h3>';
        $numero=$_GET['numNombre'];
        for($i = 0; $i < $numero; ++$i){
            echo $faker->name().'<br>';
        }
    }
    if(isset($_GET['numEmail'])){
        echo '<h3>Emails</h3>';
        $numero=$_GET['numEmail'];
        for($i = 0; $i < $numero; ++$i){
            echo $faker->email().'<br>';
        }
    }
    if(isset($_GET['numTelefono'])){
        echo '<h3>Telefonos</h3>';
        $numero=$_GET['numTelefono'];
        for($i = 0; $i < $numero; ++$i){
            echo $faker->mobileNumber().'<br>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Generar Datos Falsos con Faker</h1>
    <form action="" method="GET">
        <label for="numNombre">Numero de Nombres:</label>
        <input type="text" name="numNombre">
        <br>
        <label for="numEmail">Numero de Emails</label>
        <input type="email" name="numEmail">
        <br>
        <label for="numTelefono">Numero de telefonos moviles</label>
        <input type="number" name="numTelefono">
        <br>
        <button type="submit">Generar</button>
    </form>


</body>
</html>