<?php
require_once __DIR__ . '/ConexionBD.php';

use App\ConexionBD;

$connection = ConexionBD::getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST['precios'] as $id => $precio) {
        $stmt = $connection->prepare("UPDATE plazas SET precio = :precio WHERE id = :id");
        $stmt->execute(['precio' => $precio, 'id' => $id]);
    }
    echo "Precios actualizados correctamente.";
}

$plazas = $connection->query("SELECT * FROM plazas")->fetchAll();
?>
<form method="POST">
    <?php foreach ($plazas as $plaza): ?>
        <label>
            Plaza <?= $plaza['id'] ?>:
            <input type="number" name="precios[<?= $plaza['id'] ?>]" value="<?= $plaza['precio'] ?>">
        </label><br>
    <?php endforeach; ?>
    <button type="submit">Actualizar</button>
</form>
