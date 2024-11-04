<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Libros</title>
</head>
<body>
    <h1>Formulario de libros</h1>
    <form action="libros_guardar.php" method="post">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required><br>

        <label for="anio">Año de Edición:</label>
        <input type="number" name="anio" min="1000" max="9999" required><br>

        <label for="precio">Precio:</label>
        <input type="number" name="precio" step="0.01" required><br>

        <label for="fecha">Fecha de Adquisición:</label>
        <input type="date" name="fecha" required><br>

        <input type="submit" value="Guardar">
    </form>

    <form action="libros_datos.php" method="get">
        <input type="submit" value="Ver todos los libros">
    </form>
</body>
</html>
