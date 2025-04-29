<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de productos</title>
</head>

<body>
    <h1>Alta de productos</h1>

    <form action="procesa.php" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre del producto:<br>
            <input type="text" id="nombre" name="nombre" required><br><br>
        </label>

        <label for="familia">Familia del producto:
            <select id="familia" name="familia">
                <?php
                //las movidas de namespace
                require_once "../vendor/autoload.php";
                use Ejercicio0405\ClasesBD\FuncionesBD;
                //sacamos las familias para el select
                $funciones = new FuncionesBD();
                $familias = $funciones->getFamilias();

                if (empty($familias)) {
                    echo "<option value=''>No hay familias disponibles</option>";
                } else {
                    foreach ($familias as $familia) {
                        echo '<option value="' . $familia->idfamilias . '">' . $familia->nombre . '</option>';
                    }
                }
                ?>
            </select>
        </label><br><br>

        <label for="descripcion">Descripción:<br>
            <textarea id="descripcion" name="descripcion" rows="4" cols="50" required></textarea><br><br>
        </label>
        <label for="precio">Precio:<br>
            <input type="text" id="precio" name="precio" required><br><br>
        </label>
        <label for="imagen">Imagen del producto (solo JPG):<br>
            <input type="file" id="imagen" name="imagen" accept="image/jpeg" required><br><br>
        </label>
        <button type="submit">Enviar</button>
    </form>

    <?php
    //no tiene perdida, depende de lo que nos devuelva el procesa decimos una cosa u otra
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['success'])) {
            echo "Se dio de alta el producto sin problemas";
        } else if (isset($_GET['error'])) {
            switch ($_GET['error']) {
                case 1:
                    echo "Por favor, rellena todos los datos";
                    break;
                case 2:
                    echo "No se puede procesar el archivo";
                    break;
                case 3:
                    echo "El archivo no tiene una extensión válida";
                    break;
                case 4:
                    echo "Por favor, introduce un precio válido";
                    break;
                case 5:
                    echo "No se ha podido guardar el producto en la base de datos";
                    break;
            }
        }
    }
    ?>
</body>

</html>