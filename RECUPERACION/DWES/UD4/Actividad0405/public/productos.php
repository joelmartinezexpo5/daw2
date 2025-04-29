<?php
require_once "../vendor/autoload.php";

use Ejercicio0405\Clases\CestaCompra;
use Ejercicio0405\ClasesBD\PDOProducto;
use Ejercicio0405\Clases\Produ;
//recuperamos datos de la sesion
session_start();


if (!isset($_SESSION['usuario'])) {
    echo "<p>Debes iniciar sesión para acceder a esta página. <a href='login.php'>Iniciar sesión</a></p>";
    exit;
}

$usuarioIdentificado = $_SESSION['usuario'];

$cesta = CestaCompra::carga_cesta();

//comprobamos si 1. nos han dicho que vaciemos la cesta 2.han seleccionado un producto a meter en la cesta
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['vaciarCesta'])) {
        $cesta = new CestaCompra();
        $cesta->guardarCesta();
    }


    if (isset($_POST['codigo'], $_POST['nombre'], $_POST['precio'])) {
        $producto = [
            'codigo' => $_POST['codigo'],
            'nombre' => $_POST['nombre'],
            'precio' => $_POST['precio']
        ];
        $cesta->nuevoArticulo($producto);
        $cesta->guardarCesta();
    }
}

//sacamos todos los productos a vender
$repositorio = new Produ(new PDOProducto());
$productos = $repositorio->listarProductos();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <link rel="stylesheet" href="estilos/estilosProductos.css">
</head>

<body>
    <header>
        <?php
        //botones
        echo "<h1>Listado de productos</h1>";
        echo "<p>Bienvenido, " . $usuarioIdentificado. ".</p>";
        echo "<div class='acciones'>";
        echo "<form action='productos.php' method='POST' style='display: inline;'>";
        echo "<button type='submit' name='vaciarCesta'>Vaciar Cesta</button>";
        echo "</form>";
        echo "<form action='cesta.php' method='POST' style='display: inline;'>";
        echo "<button type='submit' name='comprar'>Comprar</button>";
        echo "</form>";
        echo "<a href='logoff.php'><button>Desconectar</button></a>";
        echo "</div>";
        ?>
    </header>

    <main>
        <div class="resumenCesta">
            <?php
            echo "<p>Total productos en la cesta: " . count($cesta->getProductos()) . "</p>";
            echo "<p>Importe total: " . number_format($cesta->getCoste(), 2) . " €</p>";
            ?>
        </div>

        <div class="productos">
            <?php
            //todos los productos,sino mensaje de que no hay
            if (!empty($productos)) {
                foreach ($productos as $producto) {
                    echo "<div class='texto'>";
                    echo "<div class='producto'>";
                    echo "<h2>" . $producto->nombre . "</h2>";
                    echo "<p>" . $producto->descripcion . "</p>";
                    echo "<p><strong>Precio:</strong> " . $producto->precio . " €</p>";
                    echo "<form action='productos.php' method='POST'>";
                    echo "<input type='hidden' name='codigo' value='" . $producto->idproductos . "'>";
                    echo "<input type='hidden' name='nombre' value='" . $producto->nombre . "'>";
                    echo "<input type='hidden' name='precio' value='" . $producto->precio . "'>";
                    echo "<button type='submit'>Añadir a la cesta</button>";
                    echo "</form>";
                    echo "</div>";
                    echo "<img src='img/" . $producto->imagen . "' alt='" . $producto->nombre . "'>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay productos disponibles.</p>";
            }
            ?>
        </div>
    </main>
</body>
</html>