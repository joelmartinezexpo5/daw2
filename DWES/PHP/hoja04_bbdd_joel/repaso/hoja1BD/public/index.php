<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\FuncionesBD;

// Obtener los equipos desde la base de datos
$equipos = FuncionesBD::getEquipos();
$jugadores = [];
$pesos = [];

// Si se selecciona un equipo, obtenemos los jugadores y los pesos
if (isset($_POST['equipo'])) {
    $jugadores = FuncionesBD::getJugadoresPorEquipo($_POST['equipo']);
    $pesos = array_column($jugadores, 'peso'); // Extraemos los pesos directamente del array de jugadores
}

// Si se envía el formulario para el traspaso de un jugador
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['jugador'])) {
    $nombre = $_POST['nombre'] ?? null;
    $procedencia = $_POST['procedencia'] ?? null;
    $altura = $_POST['altura'] ?? null;
    $peso = $_POST['peso'] ?? null;
    $posicion = $_POST['posicion'] ?? null;

    if ($nombre && $procedencia && $altura && $peso && $posicion) {
        $jugadorCodigo = $_POST['jugador']; // Código del jugador seleccionado
        FuncionesBD::traspasarJugador($jugadorCodigo, $nombre, $procedencia, $altura, $peso, $posicion);
    } else {
        echo "<p>Error: Todos los campos deben estar completos.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugadores de la NBA</title>
</head>
<body>
    <h1>Jugadores de la NBA</h1>
    <hr>
    <form action="" method="post">
        <label for="equipo">Equipo:</label>
        <select name="equipo" id="equipo">
            <?php foreach ($equipos as $equipo): ?>
                <option value="<?= htmlspecialchars($equipo) ?>" <?= isset($_POST['equipo']) && $_POST['equipo'] === $equipo ? 'selected' : '' ?>>
                    <?= htmlspecialchars($equipo) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Mostrar</button>
    </form>

    <?php if (!empty($jugadores)): ?>
        <h2>Jugadores del equipo</h2>
        <table border="1">
            <tr>
                <th>Nombre del Jugador</th>
                <th>Peso</th>
            </tr>
            <?php foreach ($jugadores as $jugador): ?>
                <tr>
                    <td><?= htmlspecialchars($jugador['nombre']) ?></td>
                    <td><?= $jugador['peso'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <h1>Traspasar jugadores</h1>
        <form action="" method="post">
            <label for="jugador">Elige un jugador:</label>
            <select name="jugador" id="jugador">
                <?php foreach ($jugadores as $jugador): ?>
                    <option value="<?= htmlspecialchars($jugador['codigo']) ?>" <?= isset($_POST['jugador']) && $_POST['jugador'] == $jugador['codigo'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($jugador['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <h2>Jugador nuevo</h2>
            <input type="hidden" name="codigo" value="<?= isset($_POST['jugador']) ? $_POST['jugador'] : '' ?>">

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <br>
            <label for="procedencia">Procedencia:</label>
            <input type="text" id="procedencia" name="procedencia" required>
            <br>
            <label for="altura">Altura:</label>
            <input type="number" id="altura" name="altura" required>
            <br>
            <label for="peso">Peso:</label>
            <input type="number" id="peso" name="peso" required>
            <br>
            <label for="posicion">Posición:</label>
            <input type="text" id="posicion" name="posicion" required>
            <br>
            <button type="submit">Realizar traspaso</button>
        </form>
    <?php endif; ?>
</body>
</html>
