<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

use Producto\Clases\PDOProducto;
use Producto\Clases\ProductoService;

$producto_service = new ProductoService(new PDOProducto());

$productos = $producto_service->listar();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
</head>

<body>
    <main>

        <div>
            <a href="./Fuentes/formularioAltaPro.php">Crear Producto</a>
        </div>


        <table>
            <thead>
                <tr>
                    <th>Informacion</th>
                    <th>Detalles</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?php echo $producto->getDescripcion() ?></td>

                        <td><a href="./Fuentes/detalle.php?id=<?php echo $producto->getId() ?>">Mas Informacion</a></td>
                        <td><a href="./Fuentes/borrar.php?id=<?php echo $producto->getId() ?>">Borrar</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </main>

</body>

</html>