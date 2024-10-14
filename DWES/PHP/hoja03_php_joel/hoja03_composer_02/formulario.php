<form action="procesar.php" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre">
    
    <label for="email">Correo electrónico:</label>
    <input type="text" id="email" name="email">
    
    <label for="mensaje">Mensaje:</label>
    <textarea id="mensaje" name="mensaje"></textarea>
    
    <input type="submit" value="Enviar">
</form>

<?php
if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 1:
            echo "<p>Por favor, rellena todos los campos.</p>";
            break;
        case 2:
            echo "<p>Por favor, introduce un email válido.</p>";
            break;
        case 3:
            echo "<p>Ha ocurrido un error al enviar el email.</p>";
            break;
    }
} elseif (isset($_GET['success'])) {
    echo "<p>El email se ha enviado correctamente.</p>";
}
?>
