<?php
namespace App\Classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use App\Interfaces\InterfazProveedorCorreo;

class ProveedorMailtrap implements InterfazProveedorCorreo{
    public function enviarCorreo(String $paraQuien, String $asunto, String $cuerpoMensaje):bool{
        // Crea una nueva instancia de PHPMailer, con true decimos que queremos generar excepciones si ocurren
        $mail = new PHPMailer(true);

        // Configuración del servidor
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                // Habilita la salida de depuración detallada
        $mail->isSMTP();                                      // Establece el tipo de correo electrónico para usar SMTP
        $mail->Host = 'smtp.mailtrap.io';                     // Especifica los servidores SMTP principales y de respaldo
        $mail->SMTPAuth = true;                               // Habilita la autenticación SMTP
        $mail->Username = '55ea113ca15b53';                   // Nombre de usuario SMTP
        $mail->Password = '204bbc05e6a9ed';                   // Contraseña SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // Habilita el cifrado TLS; `ssl` también aceptado
        $mail->Port = 587;                                    // Puerto TCP para conectarse

        try {
            // Configura y envía el mensaje
            $mail->setFrom('joelmartinezexpo@gmail.com', 'joel');
            $mail->addAddress($paraQuien);
            $mail->Subject = $asunto;
            $mail->Body = $cuerpoMensaje;
            $mail->send();
            return true;
        } catch (Exception $e) {
            echo 'El mensaje no pudo ser enviado.';
            echo 'Error de correo: ' . $mail->ErrorInfo;
            return false;
        }
    }
}