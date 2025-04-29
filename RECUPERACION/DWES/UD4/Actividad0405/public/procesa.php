<?php
require_once "../vendor/autoload.php";
require_once "../src/Funciones/helper.php";

use Ejercicio0405\Clases\Producto;
use Ejercicio0405\Clases\Produ;
use Ejercicio0405\ClasesBD\PDOProducto;
use Ejercicio0405\ClasesBD\FuncionesBD;
use Ejercicio0405\ClasesBD\ConexionBD;
$repositorio = new PDOProducto(); 
$produ = new Produ($repositorio); 
$funciones = new FuncionesBD(); 

// Verificar que los campos se hayan pasado todo con las funciones del helper mientras se pueda
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        !validar_requerido($_POST['nombre']) || !validar_requerido($_POST['familia']) ||
        !validar_requerido($_POST['descripcion']) || !validar_requerido($_POST['precio']) ||
        !isset($_FILES['imagen'])
    ) {
        redireccionar('altaProductos.php?error=1');
    }

    // Verificar que el precio sea numérico
    if (!validar_numerico($_POST['precio'])) {
        redireccionar('altaProductos.php?error=3');
    }

    $fichero = $_FILES['imagen'];

    // Verificar que la imagen se haya subido correctamente
    if (!validar_subida_fichero($fichero)) {
        redireccionar('altaProductos.php?error=2');
    }

    // Verificar que el formato de la imagen sea correcto
    if (!validar_formato_imagen(pathinfo($fichero['name'], PATHINFO_EXTENSION))) {
        redireccionar('altaProductos.php?error=4');
    }

    // Limpiar los datos de entrada
    $nombre = limpiar_entrada($_POST['nombre']);
    $descripcion = limpiar_entrada($_POST['descripcion']);
    $precio = limpiar_entrada($_POST['precio']);
    $familia = limpiar_entrada($_POST['familia']);

    // Generar el nombre único para la imagen
    $nombreGenerado = uniqid() . "_" . basename($fichero['name']);
    $rutaCompleta = "img/" . $nombreGenerado;

    // Crear el producto
    $producto = new Producto($nombre, $precio, $familia, $descripcion);

    if ($produ->crearProducto($producto)) {
        // Obtener el último ID insertado
        $stmt = ConexionBD::getConnection();
        $idProducto = $stmt->lastInsertId();

        // Mover la imagen y asociarla al producto
        if (move_uploaded_file($fichero['tmp_name'], $rutaCompleta) && $funciones->crearImagen($idProducto, $nombreGenerado)) {
            redireccionar('altaProductos.php?success=1');
        } else {
            redireccionar('altaProductos.php?error=5');
        }
    } else {
        redireccionar('altaProductos.php?error=5');
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
   
    $produ->borrarProducto($_GET['id']);
    redireccionar('index.php');
}
?>