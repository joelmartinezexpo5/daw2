<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Alumno</title>
</head>
<body>
    <h2>Formulario de Alumno</h2>
    <form action="procesa.php" method="post">
        <label for="nombre">Nombre del Alumno:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br><br>

        <label>Módulo:</label>
        <select name="modulo">
            <option value="Desarrollo Web en Entorno Servidor">Desarrollo Web en Entorno Servidor</option>
            <option value="Desarrollo Web en Entorno Cliente">Desarrollo Web en Entorno Cliente</option>
        </select>
        <br><br>

        <button type="submit">Enviar con POST</button>
    </form>

    <br>

    <form action="procesa.php" method="get">
        <label for="nombre2">Nombre del Alumno:</label>
        <input type="text" id="nombre2" name="nombre" required>
        <br><br>

        <label>Módulo:</label>
        <select name="modulo">
            <option value="Desarrollo Web en Entorno Servidor">Desarrollo Web en Entorno Servidor</option>
            <option value="Desarrollo Web en Entorno Cliente">Desarrollo Web en Entorno Cliente</option>
        </select>
        <br><br>

        <button type="submit">Enviar con GET</button>
    </form>
</body>
</html>
