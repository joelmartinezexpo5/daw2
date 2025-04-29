<?php
require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use Producto\Clases\Producto;
use Producto\Clases\Familia;
use Producto\Clases\Imagen;
use Producto\Clases\Funciones;
use Producto\Clases\ProductoService;
use Producto\Clases\PDOProducto;

$familias = Funciones::getFamilias();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $requerido = true;

    foreach ($_POST as $clave => $valor) {
        $requerido = validarRequerido($valor);
        if (!$requerido) redireccionar("formularioAltaPro.php?error=1");
    }

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $familia = $_POST['familia'];
    $precio = $_POST['precio'];

    $imagen = $_FILES['imagen'];


    if (!validarSubidaFichero($imagen)) {
        redireccionar("formularioAltaPro.php?error=2");
    }

    $tipo_imagen = $imagen['type'];

    if (!validarFormatoImagen($tipo_imagen)) {
        redireccionar("formularioAltaPro.php?error=3");
    }
    $id_unico = uniqid();
    $imagen_nombre_bd = "{$id_unico}-{$imagen["name"]}";
    $upload_file = "./../Imagenes/{$imagen["name"]}";
    move_uploaded_file($imagen["tmp_name"], $upload_file);

    if (!validarNumerico($precio)) {
        redireccionar("formularioAltaPro.php?error=4");
    }

    $precio = floatval($precio);
    $familia_obj = $familias[$_POST['familia']];
    $imagen_obj = new Imagen($imagen_nombre_bd, $upload_file);

    $producto = new Producto($nombre, $descripcion, $precio, $familia_obj, $imagen_obj);

    $producto_service = new ProductoService(new PDOProducto());


    if ($producto_service->crear($producto)) {
        redireccionar("formularioAltaPro.php?success=1");
    } else {
        unlink($upload_file);
        redireccionar("formularioAltaPro.php?error=5");
    }
}
