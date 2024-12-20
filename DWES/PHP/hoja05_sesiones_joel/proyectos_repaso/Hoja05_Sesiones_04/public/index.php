<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\classes\Autenticarse;

//* Iniciar la sesion 
Autenticarse::inicializar();

//* Configurar la base de datos
Autenticarse::configurar();

//*Ejecutar la accion segun el parametro de accion en la URL
Autenticarse::runAccion();


