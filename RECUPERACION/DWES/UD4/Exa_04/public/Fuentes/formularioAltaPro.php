<?php
require_once dirname(__DIR__, 2) . '/vendor/autoload.php';
use Producto\Clases\Funciones;

$familias = Funciones::getFamilias();



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>

<body>

    <?php
    $mensaje = '';
    if (isset($_GET['error'])) {
        $error = intval($_GET['error']);
        if ($error === 1) {
            $mensaje = 'Por favor, rellena todos los datos';
        } elseif ($error === 2) {
            $mensaje = 'No se puede procesar el archivo';
        } elseif ($error === 3) {
            $mensaje = 'El archivo no tiene extension valida';
        } elseif ($error === 4) {
            $mensaje = 'Por favor, introduce un precio valido';
        } else {
            $mensaje = 'No se ha podido guardar el producto en la base de datos';
        }
    }
    if (isset($_GET['success'])) {
        $mensaje = 'El producto ha sido guardado satisfactoriamente';
    }

    ?>

    <header>
        <h1>Creacion de producto</h1>
    </header>
    <div>
        <?php if (!empty($mensaje)) echo $mensaje ?>
    </div>
    <main>
        <header>
            <h2>Alta de producto</h2>
        </header>

        <form action="procesa.php" method="post" enctype="multipart/form-data">

            <div>
                <input type="text" name="nombre" placeholder="Nombre">
            </div>
            <div>
                <textarea name="descripcion" placeholder="Descripcion"></textarea>
            </div>
            <div>
                <input type="text" name="precio" placeholder="Precio">
            </div>
            <div>
                <select name="familia">
                    <option value="1" selected disabled> Elige una familia...</option>
                    <?php foreach ($familias as $familia): ?>
                        <option value="<?php echo $familia->getCodigo() ?>"> <?php echo $familia->getNombre() ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div>
                <input type="file" name="imagen">
            </div>
            <div>
                <input type="submit" value="Enviar">
            </div>

        </form>

        <div><a href="./../index.php">Volver Listado</a></div>
    </main>


</body>

</html>