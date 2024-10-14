<?php
$equipos = [
    "Real Madrid" => [
        "entrenador" => ["Ancelotti", "/images/ancelotti.jpg"],
        "jugadores" => [
            ["Courtois", "/images/courtois.jpg"],
            ["Alaba", "/images/alaba.jpg"],
            ["Mbappe", "/images/mbappe.jpg"]
        ]
    ],
    "Barcelona" => [
        "entrenador" => ["Flick", "/images/flick.jpg"],
        "jugadores" => [
            ["Ter Stegen", "/images/terstegen.jpg"],
            ["Iñigo Martinez", "/images/martinez.png"],
            ["Raphinha", "/images/raphinha.png"]
        ]
    ]
];

$equipoSeleccionado = "";
$componenteSeleccionado = "jugadores"; // por defecto

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $equipoSeleccionado = $_POST['equipo'];
    $componenteSeleccionado = $_POST['componente'];
}

?>

<form method="POST">
    <label for="equipo">Selecciona un equipo:</label>
    <select name="equipo" id="equipo">
        <option value="todos" <?php if ($equipoSeleccionado == 'todos') echo 'selected'; ?>>Todos</option>
        <?php foreach (array_keys($equipos) as $equipo): ?>
            <option value="<?php echo $equipo; ?>" <?php if ($equipoSeleccionado == $equipo) echo 'selected'; ?>>
                <?php echo $equipo; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="componente">Componentes:</label>
    <input type="radio" name="componente" value="entrenador" <?php if ($componenteSeleccionado == 'entrenador') echo 'checked'; ?>>Entrenador
    <input type="radio" name="componente" value="jugadores" <?php if ($componenteSeleccionado == 'jugadores') echo 'checked'; ?>>Jugadores
    <button type="submit">Mostrar</button>
</form>

<?php
function mostrarComponentes($equipo, $componente, $equipos) {
    echo "<h3>$equipo</h3><table border='1'><tr><th>Nombre</th><th>Imagen</th></tr>";
    if ($componente == "entrenador") {
        echo "<tr><td>" . $equipos[$equipo]['entrenador'][0] . "</td><td><img src='" . $equipos[$equipo]['entrenador'][1] . "' width='100'></td></tr>";
    } else {
        foreach ($equipos[$equipo]['jugadores'] as $jugador) {
            echo "<tr><td>" . $jugador[0] . "</td><td><img src='" . $jugador[1] . "' width='100'></td></tr>";
        }
    }
    echo "</table>";
}

if ($equipoSeleccionado == "todos") {
    foreach (array_keys($equipos) as $equipo) {
        mostrarComponentes($equipo, $componenteSeleccionado, $equipos);
    }
} elseif ($equipoSeleccionado) {
    mostrarComponentes($equipoSeleccionado, $componenteSeleccionado, $equipos);
}
?>
