<?php

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use Producto\Clases\PDOProducto;
use Producto\Clases\ProductoService;

$producto_service = new ProductoService(new PDOProducto());

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $producto = $producto_service->listarPorId($id);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
</head>

<body>

    <a href="./../index.php">Volver</a>
    <main>
        <picture>
            <img src="<?php echo $producto->getImagen()->getURL() ?>" alt="<?php echo $producto->getImagen()->getNombre() ?>">
        </picture>

        <header>
            <h1><?php echo $producto->getNombre() ?></h1>
        </header>
        <div>
            <div>
                <h2>Descripcion</h2>
                <p><?php echo $producto->getDescripcion() ?></p>
            </div>
            <div>
                <h2>Precio</h2>
                <p><?php echo $producto->getPrecio() ?></p>
            </div>
        </div>

    </main>

</body>

</html>