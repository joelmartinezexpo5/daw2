<?php
require_once __DIR__ .  '/../vendor/autoload.php';

use App\Classes\funcionesBD;

$equipos = funcionesBD::getEquipos();
$jugadores = [];
$pesos = [];
$jugadorSeleccionado = '';
$nombreNuevo = '';
$procedenciaNueva = '';
$alturaNueva = '';
$pesoNuevo = '';
$posicionNueva = '';
$mensaje = '';

// Si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $equipoSeleccionado = $_POST['equipo'];
    $jugadorSeleccionado = $_POST['jugador'] ?? '';
    $nombreNuevo = $_POST['nuevoNombre'] ?? '';
    $procedenciaNueva = $_POST['nuevaProcedencia'] ?? '';
    $alturaNueva = $_POST['nuevaAltura'] ?? '';
    $pesoNuevo = $_POST['nuevoPeso'] ?? '';
    $posicionNueva = $_POST['nuevaPosicion'] ?? '';

    // Cargar los jugadores para el equipo seleccionado
    $resultados = funcionesBD::getJugadoresPorEquipo($equipoSeleccionado);
    $jugadores = $resultados['jugadores'];
    $pesos = $resultados['pesos'];

    // Si se ha seleccionado un jugador y se han ingresado nuevos datos, realizar el UPDATE
    if ($jugadorSeleccionado && $nombreNuevo && $pesoNuevo) {
        try {
            funcionesBD::actualizarJugador($jugadorSeleccionado, $nombreNuevo, $procedenciaNueva, $alturaNueva, $pesoNuevo, $posicionNueva);
            $mensaje = 'Datos del jugador actualizados con éxito.';
        } catch (Exception $e) {
            $mensaje = 'Error: ' . $e->getMessage();
        }
    }
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

        table,
        th,
        td {
            border: 2px solid black;
        }

        th,
        td {
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
        <select name="equipo" id="equipo" onchange="this.form.submit()">
            <option value="">Selecciona un equipo</option>
            <?php foreach ($equipos as $equipo): ?>
                <option value="<?= htmlspecialchars($equipo) ?>" <?= isset($equipoSeleccionado) && $equipo == $equipoSeleccionado ? 'selected' : '' ?>>
                    <?= htmlspecialchars($equipo) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <?php if (!empty($jugadores)): ?>
        <h2>Jugadores del equipo <?= htmlspecialchars($equipoSeleccionado) ?>:</h2>
        <table>
            <tr>
                <th>Nombre del Jugador</th>
                <th>Peso</th>
            </tr>
            <?php foreach ($jugadores as $index => $jugador): ?>
                <tr>
                    <td><?= htmlspecialchars($jugador) ?></td>
                    <td><?= htmlspecialchars($pesos[$index]) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <hr>

    <br><br>

    <h1>Traspasos de jugadores</h1>
    <form action="" method="post">
        <label for="equipo">Equipo:</label>
        <select name="equipo" id="equipo" onchange="this.form.submit()">
            <option value="">Selecciona un equipo</option>
            <?php foreach ($equipos as $equipo): ?>
                <option value="<?= htmlspecialchars($equipo) ?>" <?= isset($equipoSeleccionado) && $equipo == $equipoSeleccionado ? 'selected' : '' ?>>
                    <?= htmlspecialchars($equipo) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Mostrar">
    </form>

    <hr>

    <h2>Baja y alta de jugadores:</h2>
    <form action="" method="post">
        <label for="jugador">Baja de jugador:</label>
        <select name="jugador" id="jugador">
            <?php foreach ($jugadores as $jugador): ?>
                <option value="<?= htmlspecialchars($jugador) ?>"><?= htmlspecialchars($jugador) ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <h3>Datos del nuevo jugador:</h3>
        <label for="nuevoNombre">Nombre:</label>
        <input type="text" name="nuevoNombre" id="nuevoNombre">
        <br><br>

        <label for="nuevaProcedencia">Procedencia:</label>
        <input type="text" name="nuevaProcedencia" id="nuevaProcedencia">
        <br><br>

        <label for="nuevaAltura">Altura:</label>
        <input type="text" name="nuevaAltura" id="nuevaAltura">
        <br><br>

        <label for="nuevoPeso">Peso:</label>
        <input type="text" name="nuevoPeso" id="nuevoPeso">
        <br><br>

        <label for="nuevaPosicion">Posicion:</label>
        <input type="text" name="nuevaPosicion" id="nuevaPosicion">

        <br><br>
        <input type="submit" value="Realizar Traspaso">
    </form>
</body>

</html>