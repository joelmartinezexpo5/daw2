<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\FuncionesBD;

$equipos = FuncionesBD::getEquipos();
if (isset($_POST['equipo'])) {
    $jugadores = FuncionesBD::getJugadoresPorEquipo($_POST['equipo']);
    $pesos = FuncionesBD::getPesos($_POST['equipo']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Jugadores de la NBA</h1>
    <hr>
    <form action="" method="post">
        <label for="equipo">Equipo:</label>
        <select name="equipo" id="equipo">
            <?php foreach ($equipos as $equipo): ?>
                <option value="<?= htmlspecialchars($equipo) ?>" <?= isset($_POST['equipo']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($equipo) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Mostrar</button>
    </form>

    <?php if (!empty($jugadores)): ?>
        <h2>Jugadores del equipo</h2>
        <table border="1px solid black">
            <tr>
                <th>Nombre del Jugador</th>
                <th>Peso</th>
            </tr>
            <?php foreach ($jugadores as $index => $jugador): ?>
                <tr>
                    <td><?= htmlspecialchars($jugador) ?></td>
                    <td><?= $pesos[$index] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>

</html>