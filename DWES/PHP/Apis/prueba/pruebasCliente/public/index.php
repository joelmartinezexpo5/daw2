<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Productos</h1>
    <table border=1>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
        <?php
            $url_servicio = "http://localhost:8001/api/productos/listado";
            $curl         = curl_init($url_servicio);

            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $respuesta_curl = curl_exec($curl);
            $productos      = json_decode($respuesta_curl);
            foreach ($productos->data as $producto) {
                echo '<tr>
            <td>' . $producto->nombre . '</td>
            <td>' . $producto->descripcion . '</td>
            <td>' . $producto->precio . '</td>
            <td><a href="get.php?id=' . $producto->id . '">Ver</a></td>
        </tr>';
            }
            curl_close($curl);
        ?>

        <?php
            // // SUBIR IMAGENES
            // $producto=array();

            // // RUTA DE LA IMAGEN
            // $ruta_imagen='C:\Users\Usuario\Pictures\camiseta.jpg';

            // // ADJUNTO DE LA IMAGEN CON CURLFILE
            // $producto = [
            //     'nombre' => 'Producto prueba con imagen',
            //     'descripcion' => 'Descripción subida con cURL',
            //     'precio' => '19.99',
            //     'imagen' => new CURLFILE($ruta_imagen)
            // ];

            // $url_servicio="http://localhost:8001/api/productos";
            // $curl=curl_init($url_servicio);

            // curl_setopt($curl, CURLOPT_CUSTOMREQUEST,"POST");
            // curl_setopt($curl,CURLOPT_POSTFIELDS,$producto);
            // curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);

            // // SE GUARDA EL RESULTADO
            // $respuesta_curl=curl_exec($curl);

            // if(curl_errno($curl)){
            //     echo 'Error al realizar la solicitud: ' . curl_error($curl);
            // } else {
            //     echo 'Respuesta API: ' . $respuesta_curl;
            // }

            // curl_close($curl);
        ?>
</body>

</html>