<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';
use Product\Config\GlobalHandler;

set_error_handler([GlobalHandler::class, 'displayError']);
set_exception_handler([GlobalHandler::class, 'handlingException']);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
    <link rel="stylesheet" href="css/general.css">
</head>

<body>

    <header class="products-title">
        <div>
            <span>Alta de Productos</span>
        </div>
    </header>

    <?php

    $mesasge = '';

    if (isset($_GET['error'])) {
        $error = intval($_GET['error']);
        if ($error === 1) {
            $message = 'Por favor, rellene todos los campos';
        } else if ($error === 2) {
            $message = 'No se puede procesar el archivo';
        } else if ($error === 3) {
            $message = 'El archivo no tiene una extension valida';
        } else if ($error === 4) {
            $message = 'Por favor, introduce un precio valido';
        } else if ($error === 5) {
            $message = 'No se ha podido guardar el producto en la base de datos';
        }
    }

    if (isset($_GET['success'])) {
        $message = 'El producto ha sido dado de alta correctamente';
    }



    ?>

    <main>
        <section class="products-message">
            <h3>Caja de mensajes</h3>
            <span class="message"> <?php if (!empty($message)) echo $message ?></span>
        </section>

        <form method="post" action="procesa.php" enctype="multipart/form-data">
            <header>
                <h2>Registrar un nuevo producto</h2>
            </header>

            <div class="form-content">

                <label>
                    <input type="text" name="name" placeholder="Nombre">
                </label>

                <label>
                    <input type="file" name="image">
                </label>

                <label>
                    <input type="text" name="price" placeholder="Precio">
                </label>

                <textarea rows="5" name="description" placeholder="Descripcion"></textarea>

                <input type="submit">

            </div>

        </form>
    </main>
</body>

</html>