<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Autenticarse;
use App\ConexionBD;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

Autenticarse::inicializar();
Autenticarse::configurar();

$accion = $_GET['action'] ?? 'paginaLogin';
switch ($accion) {
    case 'paginaLogin':
        include 'paginaLogin.php';
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
        redireccionar('/index.php?action=paginaLogin');
}
