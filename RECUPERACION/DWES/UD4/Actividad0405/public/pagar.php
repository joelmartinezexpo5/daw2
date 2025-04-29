<?php
require_once "../vendor/autoload.php";

use Ejercicio0405\Clases\CestaCompra;
//recuperamos datos de sesion
session_start();

//si no esta logeao, fuera 
if (!isset($_SESSION['usuario'])) {
    echo "<p>Debes iniciar sesión para acceder a esta página. <a href='login.php'>Iniciar sesión</a></p>";
    exit;
}

$usuarioIdentificado = $_SESSION['usuario'];

//cargamos la cesta ya que la vamos a mostrar
$cesta = CestaCompra::carga_cesta();

//el total
$totalImporte = $cesta->getCoste();

//la vaciamos y abajo mostramos la info
unset($_SESSION['cesta']);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagar</title>
    <link rel="stylesheet" href="estilos/estilosPagar.css">
</head>

<body>
    <header>
        <?php
        echo "<h1>Pago realizado</h1>";
        echo "<p>Gracias por tu compra, " . $usuarioIdentificado . ".</p>";
        ?>
    </header>

    <main>
        <div class="resumenPago">
            <?php
            echo "<p>Has pagado un total de: " . $totalImporte . " €</p>";
            ?>
        </div>

        <div class="accionesPago">
            <a href="productos.php"><button>Volver al inicio</button></a>
        </div>
    </main>
</body>
</html>