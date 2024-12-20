<?php

namespace App;

use PDO;

class Autenticarse
{
    public static function inicializar(): void
    {
        iniciar_sesion();
    }

    public static function configurar(): void
    {
        $db = ConexionBD::getConnection();
        $db->exec("CREATE TABLE IF NOT EXISTS usuarios (
            id INT AUTO_INCREMENT PRIMARY KEY,
            correo VARCHAR(255) UNIQUE NOT NULL,
            clave VARCHAR(255) NOT NULL
        )");
        self::crearDatosUsuario();
    }

    private static function crearDatosUsuario(): void
    {
        $db = ConexionBD::getConnection();
        $correo = 'usuario@educantabria.com';
        $clave = password_hash('password', PASSWORD_BCRYPT);
        $db->prepare("INSERT IGNORE INTO usuarios (correo, clave) VALUES (:correo, :clave)")
           ->execute(['correo' => $correo, 'clave' => $clave]);
    }

    public static function autenticar(): void
    {
        if (!esPost()) {
            flash('error', 'Método HTTP no permitido');
            redireccionar('/index.php?action=paginaLogin');
        }
        if (estaLogueado()) {
            redireccionar('/index.php?action=paginaConectado');
        }
        $correo = $_POST['correo'] ?? '';
        $clave = $_POST['clave'] ?? '';

        $db = ConexionBD::getConnection();
        $stmt = $db->prepare("SELECT * FROM usuarios WHERE correo = :correo");
        $stmt->execute(['correo' => $correo]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($clave, $usuario['clave'])) {
            iniciar_sesion();
            $_SESSION['user_id'] = $usuario['id'];
            $_SESSION['visitas'] = ($_SESSION['visitas'] ?? 0) + 1;
            redireccionar('/index.php?action=paginaConectado');
        } else {
            flash('error', 'Credenciales incorrectas');
            redireccionar('/index.php?action=paginaLogin');
        }
    }

    public static function paginaConectado(): void
    {
        if (!estaLogueado()) {
            flash('error', 'No tienes acceso a esta página');
            redireccionar('/index.php?action=paginaLogin');
        }
        echo "Hola, tu ID de usuario es: " . $_SESSION['user_id'] . "<br>";
        echo "Has visitado esta página " . $_SESSION['visitas'] . " veces.<br>";
        echo "<a href='/index.php?action=desconectarse'>Cerrar sesión</a>";
    }

    public static function desconectarse(): void
    {
        iniciar_sesion();
        session_destroy();
        redireccionar('/index.php?action=paginaLogin');
    }
}
