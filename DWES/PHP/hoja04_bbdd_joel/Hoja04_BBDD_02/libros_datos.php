<?php
require_once 'funcionesBD.php';
$libros = obtenerLibros();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Libros</title>
</head>
<body>
    <h1>Libros en la Base de Datos</h1>
    <table border="1">
        <tr>
            <th>Número Ejemplar</th>
            <th>Título</th>
            <th>Año de Edición</th>
            <th>Precio</th>
            <th>Fecha de Adquisición</th>
        </tr>
        <?php foreach ($libros as $libro): ?>
            <tr>
                <td><?php echo $libro['numero_ejemplar']; ?></td>
                <td><?php echo $libro['titulo']; ?></td>
                <td><?php echo $libro['anyo_edicion']; ?></td>
                <td><?php echo $libro['precio']; ?></td>
                <td><?php echo $libro['fecha_adquisicion']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br><a href="libros.php">Volver</a>
</body>
</html>
