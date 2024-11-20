<?php
namespace App;

use PDO;

class DB {
    private $pdo;

    public function __construct() {
        $this->pdo = ConexionBD::getConnection();
    }

    // Método para obtener todos los médicos
    public function getMedicos() {
        // Consultamos todos los médicos de la base de datos
        $stmt = $this->pdo->query('SELECT * FROM medicos');
        $medicos = [];

        // Iteramos sobre los médicos obtenidos
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Obtenemos el turno del médico
            $turnoStmt = $this->pdo->prepare('SELECT * FROM turnos WHERE id = ?');
            $turnoStmt->execute([$row['turno_id']]);
            $turnoRow = $turnoStmt->fetch(PDO::FETCH_ASSOC);
            $turno = new Turno($turnoRow['id'], $turnoRow['nombre']); // Creamos un objeto Turno

            // Verificamos el tipo de médico (Familia o Urgencia)
            if ($row['tipo'] === 'Familia') {
                // Si es de Familia, obtenemos los datos específicos de la tabla familia
                $familiaStmt = $this->pdo->prepare('SELECT * FROM familia WHERE medico_id = ?');
                $familiaStmt->execute([$row['id']]);
                $familiaRow = $familiaStmt->fetch(PDO::FETCH_ASSOC);
                // Creamos un objeto Familia con los datos del médico y los de familia
                $medicos[] = new Familia($row['codigo'], $row['nombre'], $row['edad'], $turno, $familiaRow['numPacientes'], $familiaRow['unidad']);
            } else {
                // Si es de Urgencias, obtenemos los datos específicos de la tabla urgencias
                $urgenciaStmt = $this->pdo->prepare('SELECT * FROM urgencias WHERE medico_id = ?');
                $urgenciaStmt->execute([$row['id']]);
                $urgenciaRow = $urgenciaStmt->fetch(PDO::FETCH_ASSOC);
                // Creamos un objeto Urgencia con los datos del médico y los de urgencia
                $medicos[] = new Urgencia($row['codigo'], $row['nombre'], $row['edad'], $turno, $urgenciaRow['unidad']);
            }
        }

        return $medicos; // Retornamos el array con los médicos
    }

    // Método para obtener todos los turnos disponibles
    public function getTurnos() {
        // Consultamos todos los turnos de la base de datos
        $stmt = $this->pdo->query('SELECT * FROM turnos');
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retornamos todos los turnos en formato asociativo
    }
}
?>
