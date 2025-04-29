<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estilos.css">
    <title>Tienda</title>
</head>

<body>
    <?php
    require_once "../vendor/autoload.php";
    use Ejercicio0405\ClasesBD\PDOProducto;
    use Ejercicio0405\Clases\Produ;

    // Usamos Produ para listar los productos
    $repositorio = new Produ(new PDOProducto());
    $productos = $repositorio->listarProductos();

    if (!empty($productos)) {
        echo "<h2>Listado de productos</h2>";
        echo "<div class='tabla'>";
        echo "<div class='fila encabezado'>
            <div class='celda'>Nombre</div>
            <div class='celda'>Descripción</div>
            <div class='celda'>Precio</div>
            <div class='celda'>Familia</div>
            <div class='celda'>Acciones</div>
          </div>";
        // simplemente mostrar los productos
        foreach ($productos as $producto) {
            echo "<div class='fila'>";
            echo "<div class='celda'>" . $producto->nombre . "</div>";
            echo "<div class='celda'>" . $producto->descripcion . "</div>";
            echo "<div class='celda'>" . $producto->precio . " €</div>";
            echo "<div class='celda'>" . $producto->familia . "</div>";
            echo "<div class='celda botones'>
                <a href='detalle.php?id=" . $producto->idproductos . "' class='boton info'>Más info</a>
                <a href='procesa.php?id=" . $producto->idproductos . "' class='boton borrar'>Borrar</a>
              </div>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<p>No hay productos disponibles.</p>";
    }
    ?>
</body>

</html>