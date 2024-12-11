<?php
session_start(); // Iniciar sesión


// Limpieza del registro de visitas
if (isset($_POST['limpiar'])) {
    $_SESSION['visitas'] = [];
    $mensaje = "Registro de visitas borrado.";
} else {
    $mensaje = '';
}

// Registrar la visita actual
$hora_actual = date("Y-m-d H:i:s"); // Formato: Año-Mes-Día Hora:Minuto:Segundo
if (!isset($_SESSION['visitas']) || empty($_SESSION['visitas'])) {
    $_SESSION['visitas'] = []; // Inicializar si no existe
    $mensaje = "¡Bienvenido! Esta es tu primera visita.";
} else {
    $mensaje = "Tus visitas anteriores:";
}
$_SESSION['visitas'][] = $hora_actual; // Registrar la visita actual
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Sesiones</title>
</head>
<body>
    <h1>Gestión de Visitas</h1>
    <p><?php echo htmlspecialchars($mensaje); ?></p>

    <?php if (!empty($_SESSION['visitas']) && count($_SESSION['visitas']) > 1): ?>
        <ul>
            <?php 
            // Mostrar todas las visitas excepto la actual
            foreach (array_slice($_SESSION['visitas'], 0, -1) as $visita): ?>
                <li><?php echo htmlspecialchars($visita); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="post">
        <button type="submit" name="limpiar">Limpiar Registro de Visitas</button>
    </form>

    <p><strong>Visita actual:</strong> <?php echo htmlspecialchars($hora_actual); ?></p>
</body>
</html>
