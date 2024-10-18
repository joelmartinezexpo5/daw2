<?php
include_once 'funcionesBD.php';

$equipos = getEquipos();
$jugadores = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $equipoSeleccionado = $_POST['equipo'];
    $jugadores = getJugadoresPorEquipo($equipoSeleccionado);
}

// function getJugadoresPorEquipo($equipo) {
//     $conexion = ConnectionPDODotenv::getConnection();
//     $jugadores = array();

//     try {
//         $stmt = $conexion->prepare('SELECT nombre FROM jugadores WHERE nombre_equipo = :nombre_equipo');
//         $stmt->bindParam(':nombre_equipo', $equipo);
//         $stmt->execute();

//         while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
//             $jugadores[] = $fila['nombre'];
//         }
//     } catch (PDOException $e) {
//         echo 'Error al consultar los jugadores: ' . $e->getMessage();
//     }

//     return $jugadores;
// }
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
            border: 1px solid black;
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
                <option value="<?= $equipo ?>"><?= $equipo ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Mostrar jugadores">
    </form>

    <?php if (!empty($jugadores)): ?>
        <h2>Jugadores del equipo <?= $_POST['equipo'] ?>:</h2>
        <table>
            <tr>
                <th>Nombre del Jugador</th>
            </tr>
            <?php foreach ($jugadores as $jugador): ?>
                <tr>
                    <td><?= $jugador ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>
