<?php
namespace Usuario\Clases;

use PDO;
class Autenticarse {

    public static function inicializar(){

        iniciar_sesion();
    }

    public static function configurar(){

        $conexion = conexionBD::getConexion();
        
        $query = 'CREATE TABLE IF NOT EXISTS usuarios (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    correo VARCHAR(255) NOT NULL UNIQUE,
                    contraseña VARCHAR(255) NOT NULL)';
        $stmt = $conexion->prepare($query);
        $stmt->execute();

        self::crearDatosUsuario();
    }

    private static function crearDatosUsuario(){

        $conexion = conexionBD::getConexion();
        $correo = 'usuario@educantabria.es';
        $password = 'password';

        $clavehashed = password_hash(password: $password,algo: PASSWORD_BCRYPT);

        $query = 'INSERT IGNORE INTO usuarios(correo,contraseña) VALUES (:correo,:clavehashed)';
        $stmt = $conexion->prepare(query: $query);
        $stmt->bindParam(param: ':correo',var: $correo);
        $stmt->bindParam(param: ':clavehashed',var: $clavehashed);

        $stmt->execute();
    }

    public static function autenticar(){

        if(!esPost()){
            flash('error','Método HTTP no permitido');
            redireccionar('index.php?action=paginaLogin');
        }

        if(estaLogueado()){
            redireccionar('index.php?action=paginaConectado');
        }

        $correo = $_POST['correo'] ?? '';
        $contraseña = $_POST['contraseña'] ?? '';

        $conexion = conexionBD::getConexion();

        $query = 'SELECT id,contraseña FROM usuarios WHERE correo = :correo';
        $stmt = $conexion->prepare(query: $query);
        $stmt->bindParam(param: ':correo',var: $correo);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if($usuario && password_verify(password: $contraseña,hash: $usuario['contraseña'])){

            $_SESSION['usuario'] = $usuario['id'];
            redireccionar('index.php?action=paginaConectado');
        }else {
            flash('error','credenciales incorrectas');
            $_SESSION['correo'] = $correo;
            redireccionar('index.php?action=paginaLogin');
        }
    }

    public static function paginaConectado(){

        if(estaLogueado()){
            redireccionar('paginaConectado.php');
        }else {
            flash('error','No tienes acceso a esta página');
            redireccionar('index.php?action=paginaLogin');
        }
    }

    public static function desconectarse() {

        if(estaLogueado()){
            session_destroy();
            redireccionar('index.php?action=paginaLogin');
        }
    }

    public static function paginaLogin(){

        if(estaLogueado()){
            redireccionar('index.php?action=paginaConectado');
        }else{
            redireccionar('paginaLogin.php');
        }
    }

    public static function runAction(){

    $action = $_GET['action'] ?? 'paginaLogin';

    switch($action){
        case 'paginaLogin':
            self::paginaLogin();
            break;
        case 'autenticar':
            self::autenticar();
            break;
        case 'paginaConectado':
            self::paginaConectado();
            break;
        case 'desconectarse':
            self::desconectarse();
            break;
    }
    }
}