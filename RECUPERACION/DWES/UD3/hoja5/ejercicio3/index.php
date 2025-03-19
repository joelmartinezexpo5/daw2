<?php
include_once 'MedicoFamilia.php';
include_once 'MedicoUrgencia.php';

$medicos = [
    new MedicoFamilia("Dr. Pérez", 45, "mañana", 50),
    new MedicoFamilia("Dra. Gómez", 60, "tarde", 70),
    new MedicoFamilia("Dr. Ruiz", 38, "mañana", 30),
    new MedicoUrgencia("Dr. López", 65, "tarde", "Traumatología"),
    new MedicoUrgencia("Dra. Sánchez", 55, "mañana", "Cardiología"),
    new MedicoUrgencia("Dr. Herrera", 62, "tarde", "Pediatría")
];

echo "<h3>Listado de Médicos</h3>";
foreach ($medicos as $medico) {
    $medico->mostrarDatos();
}

$count = 0;
foreach ($medicos as $medico) {
    if ($medico instanceof MedicoUrgencia && $medico->getTurno() == "tarde" && $medico->getEdad() > 60) {
        $count++;
    }
}
echo "<h3>Número de médicos de urgencia en turno de tarde con más de 60 años: $count</h3>";

$min_pacientes = 50;
echo "<h3>Médicos de Familia con $min_pacientes o más pacientes</h3>";
foreach ($medicos as $medico) {
    if ($medico instanceof MedicoFamilia && $medico->getNumPacientes() >= $min_pacientes) {
        $medico->mostrarDatos();
    }
}