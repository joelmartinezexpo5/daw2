<?php
require_once "interfaces/Volador.php";
require_once "traits/Mensaje.php";
require_once "classes/ElementoVolador.php";
require_once "classes/Avion.php";
require_once "classes/Aeropuerto.php";
require_once "classes/Helicoptero.php";

use Classes\Aeropuerto;
use Classes\Avion;
use Classes\Helicoptero;

$aeropuerto = new Aeropuerto();
$avion1 = new Avion("Boeing 747", 2, 4, "Iberia", "2020-05-01", 10000);
$avion2 = new Avion("Airbus A320", 2, 2, "Lufthansa", "2019-06-15", 9000);
$avion3 = new Avion("Concorde", 2, 4, "British Airways", "2000-09-01", 15000);
$heli1 = new Helicoptero("Heli1", 1, "John Doe", 2);
$heli2 = new Helicoptero("Heli2", 1, "Jane Doe", 3);
$heli3 = new Helicoptero("Heli3", 1, "Mike Smith", 4);

$aeropuerto->insertar($avion1);
$aeropuerto->insertar($avion2);
$aeropuerto->insertar($avion3);
$aeropuerto->insertar($heli1);
$aeropuerto->insertar($heli2);
$aeropuerto->insertar($heli3);

$aeropuerto->buscar("Boeing 747");
$aeropuerto->buscar("Desconocido");
$aeropuerto->listarCompania("Iberia");
$aeropuerto->listarCompania("Delta");
$aeropuerto->rotores(3);
$aeropuerto->rotores(5);

$avion1 = $aeropuerto->despegar("Boeing 747", 5000, 200);
if ($avion1) {
    echo $avion1->volando() ? "El avión está volando.\n" : "El avión no despegó.\n";
    $avion1->mostrarInformacion();
}

$heli1 = $aeropuerto->despegar("Heli1", 200, 100);
if ($heli1) {
    echo $heli1->volando() ? "El helicóptero está volando.\n" : "El helicóptero no despegó.\n";
    $heli1->mostrarInformacion();
}