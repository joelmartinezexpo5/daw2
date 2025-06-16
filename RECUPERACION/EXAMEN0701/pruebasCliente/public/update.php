<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Formulario de edicion</h1>
    <form method="post"  enctype="multipart/form-data">
        <label for="id">Id: <br>
            <input type="text" name="id" id="id"><br>
        </label>
        <label for="titulo">titulo: <br>
            <input type="text" name="titulo" id="titulo"><br>
        </label>
        <label for="descripcion">Descripcion: <br>
            <input type="text" name="descripcion" id="descripcion"><br>
        </label>
        <label for="precio">Precio: <br>
            <input type="number" name="precio" id="precio"><br>
        </label>
        <label for="imagen">Imagen: </label>
        <input type="file" name="imagen"><br>
        <button>Editar Producto</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && isset($_POST['titulo']) && isset($_POST['descripcion']) && isset($_POST['precio'])) {
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
         /**tengo que pasar asi los datos porque es lo que espera CURLOPT_POSTFIELDS */
        $producto = [
            "titulo" => $titulo,
            "descripcion" => $descripcion,
            "precio" => $precio,
            "id" => $id,
        ];
        if(isset($_FILES['imagen'])){
             $tituloImagen = uniqid() . "_" . $_FILES['imagen']['name'];

        $producto['imagen'] = new CURLFILE($_FILES['imagen']['tmp_name'], $_FILES['imagen']['type'], $tituloImagen);
        }else{
            $producto['imagen']=null;
        }
       
        $url_servicio = 'http://localhost:8001/api/productos/' . $id;
        $curl = curl_init($url_servicio);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $producto);
       

       
        $respuesta_curl = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $resultado = json_decode($respuesta_curl);
        curl_close($curl);

        if (curl_errno($curl) || !$resultado || (isset($resultado->status) && $resultado->status == "error") || $http_code >= 400) {
            echo 'Error al editar el producto<br>';
            echo "HTTP code: $http_code<br>";
            echo "Respuesta: $respuesta_curl";
        } else {
            header('Location: index.php?success=1');
            exit;
        }
    }
    ?>
</body>

</html>