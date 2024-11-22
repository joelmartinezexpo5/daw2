<?php
require_once '../vendor/autoload.php';

use App\DB;

$db = new DB();
$medicos = $db->getMedicos();

echo "<h1>Médicos del Hospital</h1>";
foreach ($medicos as $medico) {
    echo $medico->toString() . "<br>";
}
?>

<a href="turnos.php">Ver médicos por turno</a><br>
<a href="medicosFamilia.php">Ver médicos de familia por pacientes</a>
