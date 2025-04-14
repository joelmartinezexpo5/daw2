<?php
require_once 'ConexionBD.php';

$mensaje = "";
$pdo = ConexionBD::getConnection();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['precios']) && $pdo) {
    try {
        $pdo->beginTransaction();
        foreach ($_POST['precios'] as $numero => $precio) {
            $stmt = $pdo->prepare("UPDATE plazas SET precio = ? WHERE numero = ?");
            $stmt->execute([$precio, $numero]);
        }
        $pdo->commit();
        $mensaje = "Precios actualizados correctamente.";
    } catch (Exception $e) {
        $pdo->rollBack();
        $mensaje = "Error: " . $e->getMessage();
    }
}

$plazas = [];
if ($pdo) {
    $plazas = $pdo->query("SELECT numero, precio FROM plazas")->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Plazas</title>
</head>
<body>
    <h1>Gestión de Plazas</h1>
    <form method="post">
        <table border="1">
            <tr>
                <th>Número</th>
                <th>Precio</th>
            </tr>
            <?php foreach ($plazas as $plaza): ?>
                <tr>
                    <td><?= $plaza['numero'] ?></td>
                    <td>
                        <input type="number" step="0.01" name="precios[<?= $plaza['numero'] ?>]" value="<?= $plaza['precio'] ?>">
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <button type="submit">Actualizar</button>
    </form>
    <?php if ($mensaje) echo "<p>$mensaje</p>"; ?>
</body>
</html>
