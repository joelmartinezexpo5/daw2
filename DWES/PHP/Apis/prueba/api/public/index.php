<?php

declare(strict_types=1);
use Pecee\SimpleRouter\SimpleRouter as Router;
use App\Controllers\Api\ApiController;
//cargamos las librerias y el fichero de rutas
require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../routes/api.php';
// cargamos el fichero .env con la configuración
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
// cargamos el router

Router::setDefaultNamespace('\App\Controllers\Api');
Router::start();