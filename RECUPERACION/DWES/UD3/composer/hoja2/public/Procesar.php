<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Classes\ServicioCorreo;
use App\Classes\ProveedorMailtrap;

if(empty($_POST['nombre']) || empty($_POST['correo']) || empty($_POST['mensaje'])){
    header('Location: index.php?error=1');
    exit;
}

if(!filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)){
    header('Location: index.php?error=2');
    exit;
}

$servicioCorreo = new ServicioCorreo(new ProveedorMailtrap);

$enviarCorreo = $servicioCorreo->enviarCorreo(
    paraQuien: $_POST['correo'],
    asunto: 'Test de envio de email',
    cuerpoMensaje: $_POST['mensaje']
);


if($enviarCorreo){
    header('Location: index.php?success=1');
    exit;
}
header('Location: index.php?error=3');
