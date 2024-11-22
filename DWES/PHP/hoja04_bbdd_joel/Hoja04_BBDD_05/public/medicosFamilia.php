<?php
require_once '../vendor/autoload.php';
use App\DB;


$db = new DB();

echo "<h1>Consultar médicos de familia por número de pacientes</h1>";
echo "<form method='post'>";
echo "<input type='number' name='numPacientes' placeholder='Número de pacientes'>";
echo "<input type='submit' value='Consultar'>";
echo "</form>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numPacientes = $_POST['numPacientes'];
    $medicos = $db->getMedicos();
    foreach ($medicos as $medico) {
        if ($medico instanceof Familia && $medico->getNumPacientes() >= $numPacientes) {
            echo $medico->toString() . "<br>";
        }
    }
}
