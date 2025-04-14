<?php
require_once 'ConexionBD.php';

$mensaje = "";
$pdo = ConexionBD::getConnection();

if ($_SERVER["REQUEST_METHOD"] === "POST" && $pdo) {
    try {
        $pdo->beginTransaction();
        $pdo->exec("DELETE FROM pasajeros");
        $pdo->exec("UPDATE plazas SET reservada = 0");
        $pdo->commit();
        $mensaje = "Pasajeros eliminados y plazas liberadas correctamente.";
    } catch (Exception $e) {
        $pdo->rollBack();
        $mensaje = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Llegada al destino</title>
</head>
<body>
    <h1>Llegada al destino</h1>
    <form method="post">
        <button type="submit">Llegada</button>
    </form>
    <?php if ($mensaje) echo "<p>$mensaje</p>"; ?>
</body>
</html>
