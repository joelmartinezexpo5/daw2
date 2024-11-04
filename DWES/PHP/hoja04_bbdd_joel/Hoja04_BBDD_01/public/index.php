<?php
require_once '../vendor/autoload.php';

use App\Classes\FuncionesBD;

$equipos = FuncionesBD::getEquipos();
$jugadores = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $equipoSeleccionado = $_POST['equipo'];
    $jugadores = FuncionesBD::getJugadoresPorEquipo($equipoSeleccionado); 
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugadores NBA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 2px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Jugadores de la NBA</h1>
    <form method="post">
        <label for="equipo">Selecciona un equipo:</label>
        <select name="equipo" id="equipo">
            <?php foreach ($equipos as $equipo): ?>
                <option value="<?= htmlspecialchars($equipo) ?>"><?= htmlspecialchars($equipo) ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Mostrar jugadores">
    </form>

    <?php if (!empty($jugadores)): ?>
        <h2>Jugadores del equipo <?= htmlspecialchars($_POST['equipo']) ?>:</h2>
        <table>
            <tr>
                <th>Nombre del Jugador</th>
            </tr>
            <?php foreach ($jugadores as $jugador): ?>
                <tr>
                    <td><?= htmlspecialchars($jugador) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>
