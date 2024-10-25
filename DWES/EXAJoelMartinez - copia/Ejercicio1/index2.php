<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Gestión de Contactos</h1>

    <?php
    require 'validaciones.php';

    $contactos = [
        "indice" => [
            "nombre" => "Juan Pérez",
            "email" => "juan.perez@gmail.com",
            "telefono" => "652678987"
        ],
        "indice2" => [
            "nombre" => "María Lopez",
            "email" => "maria.lopez@gmail.com",
            "telefono" => "656714560"
        ]
    ];

    if (isset($_POST['agregar'])) {
        $nom = $_POST['nombre'];
        $email = $_POST['email'];
        $tel = $_POST['telefono'];

        $validaciones = new validaciones();
        $mensaje = '';

        // Validar datos
        if ($validaciones->validaNombre($nom) && 
            $validaciones->validaEmail($email) && 
            $validaciones->validaTelefono($tel)) {

            $numContactos = count($contactos);
            $contactos += [
                "indice" . ($numContactos + 1) => [
                    "nombre" => $nom,
                    "email" => $email,
                    "telefono" => $tel
                ]
            ];
            $mensaje = 'Datos insertados correctamente';
        } else if (!$validaciones->validaNombre($nom)) {
            $mensaje = 'Error: el nombre debe tener al menos 3 letras y no contener caracteres especiales';
        } else if (!$validaciones->validaEmail($email)) {
            $mensaje = 'Error: el Correo electrónico no es válido';
        } else {
            $mensaje = 'Error: el código tiene que tener exactamente 9 dígitos numéricos';
        }
    }
    ?>

    <form action="" method="post">
        <label>
            Nombre:
            <input type="text" name="nombre" required value="<?php echo isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : ''; ?>">
        </label><br>
        <label>
            Correo Electrónico:
            <input type="text" name="email" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
        </label><br>
        <label>
            Teléfono:
            <input type="text" name="telefono" required value="<?php echo isset($_POST['telefono']) ? htmlspecialchars($_POST['telefono']) : ''; ?>">
        </label><br>
        <br>
        <button type="submit" name="agregar">Agregar Contacto</button>
        <br>
    </form>

    <?php
    if (isset($mensaje)) {
        echo '<br>' . $mensaje; 
    }

    echo "<table border='1'>";
    echo "<th>Nombre</th>";
    echo "<th>Email</th>";
    echo "<th>Teléfono</th>";
    foreach ($contactos as $contacto) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($contacto["nombre"]) . "</td>";
        echo "<td>" . htmlspecialchars($contacto["email"]) . "</td>";
        echo "<td>" . htmlspecialchars($contacto["telefono"]) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>
</html>
