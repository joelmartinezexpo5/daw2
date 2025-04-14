<?php
require_once 'ConexionBD.php';

$mensaje = "";
$pdo = ConexionBD::getConnection();

if ($_SERVER["REQUEST_METHOD"] === "POST" && $pdo) {
    try {
        $dni = $_POST["dni"];
        $nombre = $_POST["nombre"];
        $numero_plaza = $_POST["plaza"];

        $pdo->beginTransaction();

        // Verificar si ya existe el pasajero
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM pasajeros WHERE dni = ?");
        $stmt->execute([$dni]);

        if ($stmt->fetchColumn() > 0) {
            throw new Exception("Ya existe un pasajero con ese DNI.");
        }

        // Insertar pasajero
        $stmt = $pdo->prepare("INSERT INTO pasajeros (dni, nombre, sexo, numero_plaza) VALUES (?, ?, '-', ?)");
        $stmt->execute([$dni, $nombre, $numero_plaza]);

        // Marcar plaza como reservada
        $stmt = $pdo->prepare("UPDATE plazas SET reservada = 1 WHERE numero = ?");
        $stmt->execute([$numero_plaza]);

        $pdo->commit();
        $mensaje = "Plaza reservada correctamente.";
    } catch (Exception $e) {
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }
        $mensaje = "Error: " . $e->getMessage();
    }
}

$plazas = [];
if ($pdo) {
    $plazas = $pdo->query("SELECT numero, precio FROM plazas WHERE reservada = 0")->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reservar plaza</title>
</head>
<body>
    <h1>Reservar Plaza</h1>
    <form method="post">
        DNI: <input type="text" name="dni" required><br>
        Nombre: <input type="text" name="nombre" required><br>
        Plaza:
        <select name="plaza" required>
            <?php foreach ($plazas as $plaza): ?>
                <option value="<?= $plaza['numero'] ?>">Nº <?= $plaza['numero'] ?> - <?= $plaza['precio'] ?>€</option>
            <?php endforeach; ?>
        </select><br>
        <button type="submit">Reservar</button>
    </form>
    <?php if ($mensaje) echo "<p>$mensaje</p>"; ?>
</body>
</html>
