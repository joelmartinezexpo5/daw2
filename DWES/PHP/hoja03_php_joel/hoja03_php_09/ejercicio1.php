<?php
$monedas = ["USD", "EUR", "JPY"];
$tiposCambio = [
    "USD" => ["EUR" => 0.85, "JPY" => 110.0],
    "EUR" => ["USD" => 1.18, "JPY" => 129.0],
    "JPY" => ["USD" => 0.0091, "EUR" => 0.0078]
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $monto = $_POST["monto"];
    $monedaOrigen = $_POST["moneda_origen"];
    $monedaDestino = $_POST["moneda_destino"];

    if ($monedaOrigen != $monedaDestino) {
        $resultado = $monto * $tiposCambio[$monedaOrigen][$monedaDestino];
        echo "El monto convertido es: $resultado $monedaDestino";
    } else {
        echo "Las monedas de origen y destino deben ser diferentes.";
    }
}
?>

<form method="POST">
    Cantidad: <input type="number" name="monto" required>
    Moneda origen:
    <select name="moneda_origen">
        <?php foreach ($monedas as $moneda) {
            echo "<option value='$moneda'>$moneda</option>";
        } ?>
    </select>
    Moneda destino:
    <select name="moneda_destino">
        <?php foreach ($monedas as $moneda) {
            echo "<option value='$moneda'>$moneda</option>";
        } ?>
    </select>
    <button type="submit">Convertir</button>
</form>
