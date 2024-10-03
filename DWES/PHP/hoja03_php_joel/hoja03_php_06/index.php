<?php
require_once 'ElementoVolador.php';
require_once 'Avion.php';
require_once 'Helicoptero.php';
require_once 'Aeropuerto.php';

$aeropuerto = new Aeropuerto();

// Crear aviones
$avion1 = new Avion("Boeing 747", 2, 4, "Air France", "2020-01-01", 12000);
$avion2 = new Avion("Airbus A320", 2, 2, "Iberia", "2019-05-12", 10000);
$avion3 = new Avion("Concorde", 2, 4, "British Airways", "2018-08-25", 15000);

// Crear helicópteros
$helicoptero1 = new Helicoptero("Helicóptero 1", 0, 1, "Pedro", 1);
$helicoptero2 = new Helicoptero("Helicóptero 2", 0, 1, "Juan", 2);
$helicoptero3 = new Helicoptero("Helicóptero 3", 0, 1, "Maria", 3);

// Insertar en el aeropuerto
$aeropuerto->insertar($avion1);
$aeropuerto->insertar($avion2);
$aeropuerto->insertar($avion3);
$aeropuerto->insertar($helicoptero1);
$aeropuerto->insertar($helicoptero2);
$aeropuerto->insertar($helicoptero3);

// Probar método buscar
$aeropuerto->buscar("Boeing 747");
$aeropuerto->buscar("Jet privado");

// Probar método listarCompania
$aeropuerto->listarCompania("Iberia");
$aeropuerto->listarCompania("American Airlines");

// Probar método rotores
$aeropuerto->rotores(2);
$aeropuerto->rotores(5);

// Despegar un avión
$avionDespegado = $aeropuerto->despegar("Airbus A320", 8000, 200);
if ($avionDespegado->volando()) {
    $avionDespegado->mostrarInformacion();
}

// Despegar un helicóptero
$helicopteroDespegado = $aeropuerto->despegar("Helicóptero 2", 150, 100);
if ($helicopteroDespegado->volando()) {
    $helicopteroDespegado->mostrarInformacion();
}
?>
