<?php
require_once '../vendor/autoload.php';
use App\DB;
use App\Familia;

// Instanciamos la base de datos
$db = new DB();

echo "<h1>Consultar médicos de familia por número de pacientes</h1>";

// Formulario para ingresar el número de pacientes
echo "<form method='post'>";
echo "<input type='number' name='numPacientes' placeholder='Número de pacientes' value='" . (isset($_POST['numPacientes']) ? $_POST['numPacientes'] : 0) . "' required>";

echo "<input type='submit' value='Consultar'>";
echo "</form>";

// Procesamos el formulario al enviar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numPacientes = (int) $_POST['numPacientes']; // Convertimos directamente a entero

    try {
        // Obtenemos los médicos
        $medicos = $db->getMedicos();
        $encontrados = false;

        // Filtramos y mostramos los médicos de familia que cumplan la condición
        foreach ($medicos as $medico) {
            if ($medico instanceof Familia && $medico->getNumPacientes() >= $numPacientes) {
                echo $medico->toString() . "<br>";
                $encontrados = true;
            }
        }

        if (!$encontrados) {
            echo "<p>No se encontraron médicos de familia con ese número de pacientes.</p>";
        }
    } catch (Exception $e) {
        echo "<p style='color: red;'>Error al obtener los datos: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
}
?>

<a href="index.php">Inicio</a><br>
<a href="turnos.php">Ver médicos por turno</a>