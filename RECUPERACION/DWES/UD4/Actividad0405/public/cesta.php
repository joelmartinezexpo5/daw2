<?php
require_once "../vendor/autoload.php";

use Ejercicio0405\Clases\CestaCompra;
//iniciamos la sesion
session_start();

//miramos si estamos con la sesion iniciada, hombre que sino como que no se puede entrar a la cesta, bueno hay paginas que lo tienen
if (!isset($_SESSION['usuario'])) {
    echo "<p>Debes iniciar sesión para acceder a esta página. <a href='login.php'>Iniciar sesión</a></p>";
    exit;
}

//guardamos el usuario
$usuarioIdentificado = $_SESSION['usuario'];

//la fucking cesta que tenemos guardada en la sesion
$cesta = CestaCompra::carga_cesta();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cesta de Productos</title>
    <link rel="stylesheet" href="estilos/estilosCesta.css">
</head>

<body>
    <header>
        <?php
        //no tiene perdida, la cesta
        echo "<h1>Resumen de la Cesta</h1>";
        echo "<p>Bienvenido, " . $usuarioIdentificado . ".</p>";
        echo "<div class='acciones'>";
        echo "<a href='logoff.php'><button>Desconectar</button></a>";
        echo "</div>";
        ?>
    </header>

    <main>
        <div class="resumenCesta">
            <?php
            echo "<p>Total productos en la cesta: " . count($cesta->getProductos()) . "</p>";
            echo "<p>Importe total: " . $cesta->getCoste() . " €</p>";
            ?>
        </div>

        <div class="productos">
            <?php
            //aqui pues bueno sacamos los productos que tenemos en la cesta, tendria que haberlo puesto objeto en vez de array, bueno me da igual la vd
            $productos = $cesta->getProductos();
            if (!empty($productos)) {
                foreach ($productos as $producto) {
                    echo "<div class='producto'>";
                    echo "<h2>" .$producto['nombre']. "</h2>";
                    echo "<p><strong>Código:</strong> " . $producto['codigo'] . "</p>";
                    echo "<p><strong>Precio:</strong> " . $producto['precio'] . " €</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay productos en la cesta.</p>";
            }
            ?>
        </div>

        <div class="accionesCesta">
            <form action="pagar.php" method="POST">
                <button type="submit">Pagar</button>
            </form>
        </div>
    </main>
</body>
</html>