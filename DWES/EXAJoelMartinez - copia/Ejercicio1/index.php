<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Gestion de Contactos</h1>
    <form action="" method = "post">
        <label>
            Nombre:
            <input type="text" name= "nombre" required>
        </label><br>
        <label>
            Correo Elctrónico:
            <input type="text" name="email" required>
        </label><br>
        <label>
            Teléfono:
            <input type="text" name="telefono" required>
        </label><br>
        <br>
        <button type="submit" name="agregar">Agregar Contacto</button>
        <br>
    </form>

    <?php
    require 'validaciones.php';
    $contactos = [
        "indice"=> [
            "nombre"=> "Juan Pérez",
            "email"=> "juan.perez@gmail.com",
            "telefono" => "652678987"
        ],
        "indice2"=> [
            "nombre" => "María Lopez",
            "email" => "maria.lopez@gmail.com",
            "telefono" => "656714560"
        ]
    ];

    if(isset($_POST['agregar'])){
        $nom = $_POST['nombre'];
        $correo = $_POST['correo'];
        $tel = $_POST['telefono'];
        $numContactos = count($contactos);
        $contactos += [
            "indice".($numContactos + 1) => [
                "nombre"=> $nom,
                "email" => $correo,
                "telefono"=>$tel
            ]
        ];
        $numContactos++;
        echo '<br>';
        echo "<table border=1>";
        echo "<th>Nombre</th>";
        echo "<th>Email</th>";
        echo "<th>Teléfono</th>";
        foreach($contactos as $contacto){
        echo "<tr>";
        echo "<td>" . $contacto["nombre"]. "</td>";
        echo "<td>" . $contacto ["email"] . "</td>";
        echo "<td>" . $contacto ["telefono"]. "</td>";
        echo "</tr>";
        }
        $validaciones = new validaciones();
    $mensaje = '';

    if($validaciones->validaNombre($nom) === true && $validaciones->validaEmail($correo) === true && $validaciones->validaTelefono($tel) ){
        $mensaje = 'Datos insertados correctamente';
    }else if($validaciones->validaNombre($nom) === false){
        $mensaje = 'Error: el nombre debe tener al menos 3 letras y no contener caracteres especiales';
    }else if ($validaciones->validaEmail($correo) === false){
        $mensaje = 'Error: el correo electrónico no es valido';
    }else {
        $mensaje = 'Error el codigo tiene que tener exactamente 9 digitos numericos';
    }
    }

    ?>
</body>
</html>
