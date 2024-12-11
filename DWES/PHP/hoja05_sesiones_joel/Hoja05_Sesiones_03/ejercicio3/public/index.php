<?php
session_start();
require_once dirname(__DIR__) . '/vendor/autoload.php';
use App\ConexionBD;

// Autenticación HTTP Básica
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
    solicitarAutenticacion();
} else {
    $usuario = $_SERVER['PHP_AUTH_USER'];
    $passwordIngresada = $_SERVER['PHP_AUTH_PW'];

    // Conexión a la base de datos a través de la clase ConexionBD
    $pdo = ConexionBD::getConnection();

    // Consultar la base de datos para validar el usuario y contraseña
    $stmt = $pdo->prepare("SELECT password FROM usuarios WHERE usuario = :usuario");
    $stmt->bindParam(':usuario', $usuario);
    $stmt->execute();

    if ($stmt->rowCount() === 1) {
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        $hashAlmacenado = $resultado['password'];

        if (password_verify($passwordIngresada, $hashAlmacenado)) {
            // Credenciales válidas, inicializar sesión
            $_SESSION['authenticated'] = true;
            $_SESSION['usuario'] = $usuario;
            if (!isset($_SESSION['visitas'])) {
                $_SESSION['visitas'] = []; // Inicializar registro de visitas
            }
        } else {
            solicitarAutenticacion();
        }
    } else {
        solicitarAutenticacion();
    }
}

// Función para solicitar autenticación básica HTTP
function solicitarAutenticacion()
{
    header('WWW-Authenticate: Basic realm="Contenido restringido"');
    header('HTTP/1.0 401 Unauthorized');
    echo "Usuario no reconocido o contraseña incorrecta.";
    exit();
}

// Manejar limpieza del registro de visitas
if (isset($_POST['limpiar'])) {
    $_SESSION['visitas'] = [];  // Limpiar el registro de visitas
    $mensaje = "Bienvenido. Esta es su primera visita.";
} else {
    $mensaje = '';
}

// Registrar la visita actual
$hora_actual = date("d/m/y \a \l\a\s H:i");

if (empty($_SESSION['visitas'])) {
    // Si no hay visitas previas, se registra la primera visita
    $mensaje = "Bienvenido. Esta es su primera visita.";
} else {
    // Si ya hay visitas previas, muestra el historial
    $mensaje = "Historial de visitas:";
}

// Siempre registrar la nueva visita después de limpiar el historial
$_SESSION['visitas'][] = $hora_actual; // Registrar la nueva visita

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilos.css">
    <title>Gestión de Sesiones</title>
</head>
<body>
    <h1>Gestionar sesiones</h1>

    <p><strong>Nombre de usuario:</strong> <?php echo htmlspecialchars($_SESSION['usuario']); ?></p>

    <p class="highlight"><?php echo htmlspecialchars($mensaje); ?></p>

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
        <button type="submit" name="limpiar">Limpiar registro</button>
    </form>

    <p><strong>Visita actual:</strong> <?php echo htmlspecialchars($hora_actual); ?></p>
</body>
</html>
