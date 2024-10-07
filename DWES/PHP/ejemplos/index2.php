<html> 
    <head> <title>Desarrollo Web</title> </head> 
<body>

<form name="input" action="respuesta.php" method="get"> 
    <label for="nombre">Nombre del alumno: </label>
    <input type="text" name="nombre" id="nombre" />
        <br />
    <p>Módulos que cursa:</p> 
    <input type="checkbox" name="modulos[]" value="DWES" />Desarrollo web en entorno servidor<br /> 
    <input type="checkbox" name="modulos[]" value="DWEC" />Desarrollo web en entorno cliente<br /> <br /> 
    <input type="submit" name="enviar" value="Enviar" />
</form>
</body>
</html>