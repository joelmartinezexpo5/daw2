<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estilosDetalle.css">
    <title>Detalle del Producto</title>
</head>
<body>
    <?php
    require_once "../vendor/autoload.php";
    use Ejercicio0405\ClasesBD\PDOProducto;
    use Ejercicio0405\Clases\Produ;

    // miramos si nos han pasado un id (sino complicado mostrar los detalles) y sacamos los datos
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        $id = $_GET['id'];
        // sacamos los datos de PDOProducto con nuestro querido Produ
        $repositorio = new Produ(new PDOProducto());
        $producto = $repositorio->obtenerProductoPorId( $id);
       
        if ($producto) {
            echo "<div class='detalle-producto'>";
            echo "<h1>" . $producto->nombre . "</h1>";
            echo "<p><strong>Descripción:</strong> " . $producto->descripcion . "</p>";
            echo "<p><strong>Precio:</strong> " . $producto->precio . " €</p>";
            echo "<p><strong>Familia:</strong> " . $producto->familia . "</p>";
            echo "<img src='img/" . $producto->imagen . "' alt='Imagen de " . $producto->nombre . "'>";
            echo "</div>";
        } else {
            // Si no se encuentra el producto con el ID proporcionado textito
            echo "<p>No se encontró el producto con el ID proporcionado.</p>";
        }
    } else {
        // Si no se proporciona un ID válido otro textito
        echo "<p>No se ha proporcionado un ID válido.</p>";
    }
    ?>
</body>
</html>