<?php
// Tasas de conversión
$tasas = [
    "USD" => ["EUR" => 0.91, "GBP" => 0.78, "USD" => 1],
    "EUR" => ["USD" => 1.10, "GBP" => 0.86, "EUR" => 1],
    "GBP" => ["USD" => 1.28, "EUR" => 1.16, "GBP" => 1]
];

$resultado = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cantidad = floatval($_POST["cantidad"]);
    $moneda_origen = $_POST["origen"];
    $moneda_destino = $_POST["destino"];

    if ($cantidad > 0 && isset($tasas[$moneda_origen][$moneda_destino])) {
        $resultado = $cantidad * $tasas[$moneda_origen][$moneda_destino];
        $mensaje = "{$cantidad} {$moneda_origen} equivale a " . number_format($resultado, 2) . " {$moneda_destino}.";
    } else {
        $mensaje = "Por favor, introduce una cantidad válida.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Monedas</title>
</head>
<body>
    <h2>Conversor de Monedas</h2>
    <form method="post">
        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" step="0.01" required>
        <br><br>

        <label for="origen">Moneda de origen:</label>
        <select id="origen" name="origen" required>
            <option value="USD">Dólar (USD)</option>
            <option value="EUR">Euro (EUR)</option>
            <option value="GBP">Libra (GBP)</option>
        </select>
        <br><br>

        <label for="destino">Moneda de destino:</label>
        <select id="destino" name="destino" required>
            <option value="USD">Dólar (USD)</option>
            <option value="EUR">Euro (EUR)</option>
            <option value="GBP">Libra (GBP)</option>
        </select>
        <br><br>

        <button type="submit">Convertir</button>
    </form>

    <?php if (!empty($mensaje)): ?>
        <h3>Resultado:</h3>
        <p><?php echo $mensaje; ?></p>
    <?php endif; ?>
</body>
</html>
