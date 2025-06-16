<?php
/*directiva PHP modo estricto de tipos, comprobaciones más rigurosas en cuento a tipo de datos 
que utilizan en las funciones y métodos, lo que ayuda a reducir errores con el tipo de datos
y mejorar la calidad y seguridad del código
*/
declare(strict_types=1);
use Pecee\SimpleRouter\SimpleRouter as Router;
//cargamos las librerias y el fichero de rutas
require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../routes/api.php';
// cargamos el fichero .env con la configuración
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
// cargamos el router
Router::start();
Router::setDefaultNamespace('Examen0701\Controllers\Api');
?>
