<?php
require_once __DIR__ . '/ConexionBD.php';

use App\ConexionBD;

try {
    $connection = ConexionBD::getConnection();
    $connection->beginTransaction();

    $connection->exec("DELETE FROM pasajeros");
    $connection->exec("UPDATE plazas SET reservada = 0");

    $connection->commit();

    echo "Llegada registrada correctamente: Pasajeros eliminados y plazas actualizadas.";
} catch (Exception $e) {
    $connection->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
