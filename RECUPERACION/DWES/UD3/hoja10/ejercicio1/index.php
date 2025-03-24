<?php
$coches = [
    "Toyota" => ["Corolla", "Camry", "Prius"],
    "Ford" => ["Fiesta", "Focus", "Mustang"],
    "BMW" => ["Serie 3", "Serie 5", "X5"]
];

$marcaSeleccionada = "";
$modelosActualizados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['marca'])) {
        $marcaSeleccionada = $_POST['marca'];
    }

    if (isset($_POST['modelos'])) {
        foreach ($_POST['modelos'] as $indice => $nuevoNombre) {
            if ($coches[$marcaSeleccionada][$indice] != $nuevoNombre) {
                $modelosActualizados[] = $nuevoNombre;
                $coches[$marcaSeleccionada][$indice] = $nuevoNombre;
            }
        }
    }
}
?>

<form method="POST">
    <label for="marca">Selecciona una marca:</label>
    <select name="marca" id="marca">
        <?php
        foreach (array_keys($coches) as $marca) {
            $selected = ($marca == $marcaSeleccionada) ? "selected" : "";
            echo "<option value='$marca' $selected>$marca</option>";
        }
        ?>
    </select>
    <button type="submit">Mostrar</button>
</form>

<?php if ($marcaSeleccionada): ?>
    <form method="POST">
        <input type="hidden" name="marca" value="<?php echo $marcaSeleccionada; ?>">
        <table border="1">
            <tr>
                <th>Modelos</th>
            </tr>
            <?php foreach ($coches[$marcaSeleccionada] as $indice => $modelo): ?>
                <tr>
                    <td><input type="text" name="modelos[<?php echo $indice; ?>]" value="<?php echo $modelo; ?>"></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <button type="submit">Actualizar</button>
    </form>
<?php endif; ?>

<?php
if (!empty($modelosActualizados)) {
    echo "Modelos actualizados: " . implode(", ", $modelosActualizados);
}
?>