<?php
use Pecee\SimpleRouter\SimpleRouter as Router;
//cargamos las librerias y el fichero de rutas
require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../routes/api.php';
// cargamos el fichero .env con la configuración
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

Router::setDefaultNamespace('\App\Controllers\Api');
// cargamos el router
Router::start();