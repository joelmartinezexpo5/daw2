<!DOCTYPE html>
<html> 
<head> 
	<title>Ejemplo Formularios</title> 
</head> 
<body>
	<h1>Ejemplo de procesado de formularios</h1> 
	<form action="ejemplo1.php" method="post">
        <label for="nombre">Introduzca su nombre:</label>
		<input type="text" id="nombre" name="nombre">
		<br/> 
        <label for="apellido">Introduzca sus apellidos:</label>
		<input type="text" id="apellido" name="apellidos"><br/> 
		<input type="submit" name="enviar" value="Enviar">
	</form>
</body> 
</html> 