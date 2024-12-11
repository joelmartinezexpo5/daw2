<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
use App\ConexionBD;

$connection = ConexionBD::getConnection();

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturar los datos del formulario
    $usuario = trim($_POST['usuario']);
    $password = $_POST['password'];
    $confirmar_password = $_POST['confirmar_password'];

    // Verificar que las contraseñas coincidan
    if ($password !== $confirmar_password) {
        $message = "Claves incorrectas.";
    } else {
        // Encriptar la contraseña con bcrypt
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Insertar el nuevo usuario en la base de datos
        try {
            $stmt = $connection->prepare("INSERT INTO usuarios (usuario, password) VALUES (:usuario, :password)");
            $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);
            $stmt->execute();

            $message = "El usuario ha sido registrado correctamente.";
        } catch (PDOException $e) {
            if ($e->getCode() === '23000') { // Código para clave duplicada (usuario único)
                $message = "El usuario ya existe.";
            } else {
                $message = "Error al registrar el usuario: " . $e->getMessage();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
</head>

<body>
    <h1>Registro de usuarios</h1>
    <hr>
    <form action="" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <label for="confirmar_password">Repetir Contraseña:</label>
        <input type="password" name="confirmar_password" id="confirmar_password" required>
        <br>
        <button type="submit">Registrar</button>
    </form>
    <p><?php echo htmlspecialchars($message); ?></p>
</body>

</html>
