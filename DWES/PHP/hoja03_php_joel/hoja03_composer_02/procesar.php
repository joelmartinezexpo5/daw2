<?php
require 'vendor/autoload.php'; // Autoload de Composer
require 'ServicioCorreo.class.php';
require 'ProveedorMailtrap.class.php';

// Validar los campos
if (empty($_POST['nombre']) || empty($_POST['email']) || empty($_POST['mensaje'])) {
    header('Location: formulario.php?error=1');
    exit;
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header('Location: formulario.php?error=2');
    exit;
}

// Crear instancias de ServicioCorreo y ProveedorMailtrap
$proveedor = new ProveedorMailtrap();
$servicioCorreo = new ServicioCorreo($proveedor);

// Enviar correo
$enviado = $servicioCorreo->enviarCorreo($_POST['email'], 'Nuevo mensaje de ' . $_POST['nombre'], $_POST['mensaje']);

if ($enviado) {
    header('Location: formulario.php?success=1');
} else {
    header('Location: formulario.php?error=3');
}
?>
