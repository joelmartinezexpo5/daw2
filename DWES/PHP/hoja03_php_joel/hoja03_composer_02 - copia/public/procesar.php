<?php
require '../vendor/autoload.php'; // Cargar el autoloader de Composer

use App\Classes\ProveedorMailtrap; // Importar la clase
use App\Classes\ServicioCorreo; // Importar la clase
use App\Interfaces\InterfazProveedorCorreo;


// Validar los campos
if (empty($_POST['nombre']) || empty($_POST['email']) || empty($_POST['mensaje'])) {
    header('Location: index.php?error=1');
    exit;
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header('Location: index.php?error=2');
    exit;
}

// Crear instancias de ServicioCorreo y ProveedorMailtrap
$proveedor = new ProveedorMailtrap();
$servicioCorreo = new ServicioCorreo($proveedor);

// Enviar correo
$enviado = $servicioCorreo->enviarCorreo($_POST['email'], 'Nuevo mensaje de ' . $_POST['nombre'], $_POST['mensaje']);

if ($enviado) {
    header('Location: index.php?success=1');
} else {
    header('Location: index.php?error=3');
}
?>
