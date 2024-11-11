<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Libros</title>
</head>
<body>
    <h1>Registrar Libro</h1>
    <form action="libros_guardar.php" method="post">
        <label>Título: <input type="text" name="titulo" required></label><br>
        <label>Año de Edición: <input type="number" name="anyo_edicion" required></label><br>
        <label>Precio: <input type="number" name="precio" step="0.01" required></label><br>
        <label>Fecha de Adquisición: <input type="date" name="fecha_adquisicion" required></label><br>
        <button type="submit">Guardar</button>
    </form>
    <br>
    <form action="libros_datos.php">
        <button type="submit">Ver todos los libros</button>
    </form>
</body>
</html>
