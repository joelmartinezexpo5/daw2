<?php
require_once __DIR__ . '/ConexionBD.php';

use App\ConexionBD;

$connection = ConexionBD::getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $plaza_id = $_POST['plaza_id'];

    try {
        $connection->beginTransaction();

        $stmt = $connection->prepare("SELECT COUNT(*) FROM pasajeros WHERE dni = :dni");
        $stmt->execute(['dni' => $dni]);
        if ($stmt->fetchColumn() > 0) {
            throw new Exception("El DNI ya existe.");
        }

        $stmt = $connection->prepare("INSERT INTO pasajeros (dni, nombre, sexo) VALUES (:dni, :nombre, '-')");
        $stmt->execute(['dni' => $dni, 'nombre' => $nombre]);

        $stmt = $connection->prepare("UPDATE plazas SET reservada = 1 WHERE id = :id");
        $stmt->execute(['id' => $plaza_id]);

        $connection->commit();
        echo "Reserva completada para la plaza $plaza_id.";
    } catch (Exception $e) {
        $connection->rollBack();
        echo "Error: " . $e->getMessage();
    }
}

$plazas = $connection->query("SELECT * FROM plazas WHERE reservada = 0")->fetchAll();
?>
<form method="POST">
    <input type="text" name="dni" placeholder="DNI" required>
    <input type="text" name="nombre" placeholder="Nombre" required>
    <select name="plaza_id">
        <?php foreach ($plazas as $plaza): ?>
            <option value="<?= $plaza['id'] ?>"><?= $plaza['id'] ?> - <?= $plaza['precio'] ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Reservar</button>
</form>
