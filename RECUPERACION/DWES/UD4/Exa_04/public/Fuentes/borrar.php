<?php

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use Producto\Clases\PDOProducto;
use Producto\Clases\ProductoService;

$producto_service = new ProductoService(new PDOProducto());

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $imagen_url = $producto_service->listarPorId($id)->getImagen()->getURL();
    unlink($imagen_url);
    $producto = $producto_service->borrar($id);
    redireccionar("./../index.php?borrar=1");
}else{
    $mensaje = 'No existe producto a eliminar';
}

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
        <div><?php if(isset($mensaje)) echo $mensaje?></div>
    </main>


</body>
</html>

