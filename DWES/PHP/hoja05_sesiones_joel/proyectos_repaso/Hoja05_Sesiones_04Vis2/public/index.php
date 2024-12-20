<?php
require_once __DIR__ .'/../vendor/autoload.php';

use Usuario\Clases\Autenticarse;

Autenticarse::inicializar();
Autenticarse::configurar();
Autenticarse::runAction();