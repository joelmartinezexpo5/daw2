<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Generar Datos Falsos con Faker</h1>
    <form action="" method="POST">
        <label for="numNombre">Numero de Nombres:</label>
        <input type="number" name="numNombre" value="<?php if(isset($_POST['numNombre'])){echo $_POST['numNombre'];}else{echo 0;} ?>">
        <br>
        <label for="numEmail">Numero de Emails</label>
        <input type="number" name="numEmail" value="<?php if(isset($_POST['numEmail'])){echo $_POST['numEmail'];}else{echo 0;} ?>">
        <br>
        <label for="numTelefono">Numero de telefonos moviles</label>
        <input type="number" name="numTelefono" value="<?php if(isset($_POST['numTelefono'])){echo $_POST['numTelefono'];}else{echo 0;} ?>">
        <br>
        <button type="submit">Generar</button>
    </form>


</body>
</html>

<?php
    require_once 'vendor/autoload.php';

    $faker = Faker\Factory::create('es_ES');

    if(isset($_POST['numNombre'])){
        echo '<h2>Resultados</h2>';
        echo '<h3>Nombres</h3>';
        echo '<ul>';
        $numero=$_POST['numNombre'];
        for($i = 0; $i < $numero; ++$i){
            echo '<li>'.$faker->name().'</li>';
        }
        echo '</ul>';
    }
    if(isset($_POST['numEmail'])){
        echo '<h3>Emails</h3>';
        echo '<ul>';
        $numero=$_POST['numEmail'];
        for($i = 0; $i < $numero; ++$i){
            echo '<li>'.$faker->email().'</li>';
        }
        echo '</ul>';
    }
    if(isset($_POST['numTelefono'])){
        echo '<h3>Telefonos</h3>';
        echo '<ul>';
        $numero=$_POST['numTelefono'];
        for($i = 0; $i < $numero; ++$i){
            echo '<li>'.$faker->mobileNumber().'</li>';
        }
        echo '</ul>';
    }
?>