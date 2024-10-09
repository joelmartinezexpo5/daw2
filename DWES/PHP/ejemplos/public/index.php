<?php
require_once __DIR__ . '/../vendor/autoload.php'; 

use App\Controllers\HolaMundoController; // el namespace

$holaMundoController = new HolaMundoController();

$holaMundoController->index();

echo '<hr>';

echo holaMundo();