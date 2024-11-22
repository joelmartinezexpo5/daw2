<?php
require_once '../vendor/autoload.php';
use App\DB;

$db = new DB();
$turnos = $db->getTurnos();


echo "<h1>Selecciona un Turno</h1>";
echo "<form action='' method='post'>";
echo "<select name='turno_id'>";
foreach ($turnos as $turno) {
    echo "<option value='" . $turno['id'] . "' " . (($turno['id'] == ($_POST['turno_id'] ?? '')) ? "selected" : "") . ">" . $turno['nombre'] . "</option>";
}
echo "</select>";
echo "<input type='submit' value='Mostrar médicos'>";
echo "</form>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $turno_id = $_POST['turno_id'];
    $medicos = $db->getMedicos();
    foreach ($medicos as $medico) {
        if ($medico->getTurno()->getId() == $turno_id) {
            echo $medico->toString() . "<br>";
        }
    }
}

