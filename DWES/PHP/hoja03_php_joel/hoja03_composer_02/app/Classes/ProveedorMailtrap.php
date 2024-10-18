<?php
namespace App\Classes;

use App\Interfaces\InterfazProveedorCorreo;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'path/to/PHPMailer/src/Exception.php';
// require 'path/to/PHPMailer/src/PHPMailer.php';
// require 'path/to/PHPMailer/src/SMTP.php';

require 'vendor/autoload.php';

class ProveedorMailtrap implements InterfazProveedorCorreo {

    public function enviarCorreo(string $paraQuien, string $asunto, string $cuerpoMensaje): bool {
        $mail = new PHPMailer(true);

        try {
            // Configuración SMTP de Mailtrap
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '7e2aa80c3cd5c1';
            $mail->Password = '85401cd46cc18c';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Detalles del correo
            $mail->setFrom('jmartineze02@educantabria.es', 'Joel');
            $mail->addAddress($paraQuien);

            $mail->isHTML(true);
            $mail->Subject = $asunto;
            $mail->Body = $cuerpoMensaje;

            return $mail->send();
        } catch (Exception $e) {
            return false;
        }
    }
}
