<?php
namespace App\classes;
require_once dirname(__DIR__).'/Ficheros/helper.php';
use App\Ficheros;
use function App\Ficheros\flash;
use function App\Ficheros\iniciar_sesion;
use function App\Ficheros\redireccionar;
use function App\Ficheros\esPost;
use function App\Ficheros\estaLogueado;


use App\DB\ConexionBD;
use PDO;

class Autenticarse
{
    //* Solamente llama a la funcion iniciar sesion para iniciarla
    public static function inicializar()
    {
        return iniciar_sesion();
    }

    //* Crea la tabla de usuarios
    public static function configurar()
    {
        $conexion = ConexionBD::getConexion();

        $query = "CREATE TABLE IF NOT EXISTS usuarios(
        id INT AUTO_INCREMENT PRIMARY KEY,
        correo VARCHAR(255) UNIQUE NOT NULL,
        clave VARCHAR(255) NOT NULL)";

        $conexion->exec($query);

        self::crearDatosUsuario();
    }

    //* Metodo privado para crear un usuario
    private static function crearDatosUsuario()
    {
        $conexion = ConexionBD::getConexion();

        //* Verifica si el usario existe
        $query = "SELECT COUNT(*) FROM USUARIOS WHERE correo = :correo";
        $stmt = $conexion->prepare($query);
        //* Remplaza :correo con ejemplo@educantbria.es
        $stmt->execute(['correo' => 'ejemplo@educantabria.es']);
        $usuarioExiste = $stmt->fetchColumn();

        //* Si no existe crea el usuario de ejemplo
        if ($usuarioExiste == 0) {
            $claveHash = password_hash('password', PASSWORD_BCRYPT);
            $query = "INSERT INTO usuarios (correo, clave) VALUES (:correo, :clave)";
            $stmt = $conexion->prepare($query);
            $stmt->execute([
                'correo' => 'ejemplo@educantabria.es',
                'clave' => $claveHash
            ]);
        }
    }
    //* Metodo para autenticar al usuario
    public static function autenticar()
    {

        //* Verifica si el método es POST
        if (!esPost()) {
            //* Si no lo es se crea mensaje de error y se redirige a paginaLogin
            flash('error', 'Metodo HTTP no permitido');
            redireccionar('index.php?action=paginaLogin');
            return;
        }

        //* Comprobamos si el usuario ya está logueado
        if (estaLogueado()) {
            //* Si lo está redirige a paginaConectado
            redireccionar('index.php?action=paginaConectado');
            return;
        }
        
        //* Recogemos las variables POST de correo y contraseña
        $correo = $_POST['correo'] ?? '';
        $clave = $_POST['clave'] ?? '';

        //* Buscamos el usuario en la base de datos
        $conexion = ConexionBD::getConexion();
        $query = 'SELECT id, correo, clave FROM usuarios WHERE correo = :correo';
        $stmt = $conexion->prepare($query);
        $stmt->execute(['correo'=>$correo]);
        $datosUsuario = $stmt->fetch(PDO::FETCH_ASSOC);

        //* Verificamos si el correo existe y si la contraseña coincide con la de la base de datos
        if ($datosUsuario && password_verify($clave, $datosUsuario['clave'])){
            
            //* Creamos la instancia de usuario
            $usuario = new Usuario((int)$datosUsuario['id'],$datosUsuario['correo'],$datosUsuario['clave']);

            //* Permite que los datos del usuario estén disponibles en otras páginas del sitio mientras dure la sesión
            $_SESSION['usuario'] = $usuario;


            redireccionar('index.php?action=paginaConectado');
        } else {
            //* Si hay error, crear un mensaje de error y redirigir a la página de login
            flash('error','Credenciales incorrectas');
            flash('correo',$correo); 
            redireccionar('index.php?action=paginaLogin');
        }
    }

    //* Método para verificar que el usuario este conectado para mostrar la página

    /**
     * ¿Por que include en vez de redireccionar()?
     * -----------------------------------------
     * Evitar doble redirección:
     * Si usamos redireccionar() de nuevo dentro 
     * de un else, crea una confusión y provoca un error de redirecciones,
     * ya que el flujo de la página redirigire dos veces en una sola ejecución. 
     * ----------------------------------------
     */
    public static function paginaConectado (){
        if (!estaLogueado()){
            flash('error','No tienes acceso a esta página');        
            redireccionar('index.php?action=paginaLogin');
            return;
        }
        // Mostrar la página conectado
        include 'paginaConectado.php';
    }

    //* Metodo para eliminar la sesion
    public static function desconectarse(){
        session_unset();
        session_destroy();
        redireccionar('index.php?action=paginaLogin');
    }

    //* Metodo para verificar que el usuario esté conectado para no mostrar el login otra vez
    public static function paginaLogin(){
        if (estaLogueado()){
            redireccionar('index.php?action=paginaConectado');
        } else {
            // flash('error','Por favor, inicia sesión');
            include 'paginaLogin.php';        
        }
    }

    //* Método para controlar la variable $_GET['accion] para saber que metodo ejecutar
    public static function runAccion (){
        //* Comprobamos si la variable get accion está definida 
        if(isset($_GET['action'])){

            //* Obtenemos el valor de la acción
            $action = $_GET['action'];

            //* Llamamos al método adecuado según el valor de la acción
            switch($action){
                case 'paginaLogin':
                    Autenticarse::paginaLogin();
                    break;
                case 'autenticar':
                    Autenticarse::autenticar();
                    break;
                case 'paginaConectado':
                    Autenticarse::paginaConectado();
                    break;
                case 'desconectarse':
                    Autenticarse::desconectarse();
                    break;
                default:
                //* Si la opción no coincide con ninguna, redireccionar a paginaLogin
                redireccionar('index.php?action=paginaLogin');
                break;
            }
        } else {
             //* Si no existe la variable en la acción URL, redirigimos al login
             redireccionar('index.php?action=paginaLogin');
        }
    }

}
