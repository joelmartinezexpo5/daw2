<?php
namespace App;

use PDO;

class DB {
    private $pdo;

    public function __construct() {
        $this->pdo = ConexionBD::getConnection();
    }

    // Método auxiliar para obtener un turno por su ID
    private function getTurnoById($turnoId) {
        $stmt = $this->pdo->prepare('SELECT id, nombre FROM turnos WHERE id = ?');
        $stmt->execute([$turnoId]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Turno($row['id'], $row['nombre']);
    }

    // Método auxiliar para obtener los datos de la tabla familia
    private function getDatosFamilia($medicoId) {
        $stmt = $this->pdo->prepare('SELECT medico_id, numPacientes, unidad FROM familia WHERE medico_id = ?');
        $stmt->execute([$medicoId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método auxiliar para obtener los datos de la tabla urgencias
    private function getDatosUrgencia($medicoId) {
        $stmt = $this->pdo->prepare('SELECT medico_id, unidad FROM urgencias WHERE medico_id = ?');
        $stmt->execute([$medicoId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para obtener todos los turnos disponibles
    public function getTurnos() {
        $stmt = $this->pdo->query('SELECT id, nombre FROM turnos');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para obtener todos los médicos
    public function getMedicos() {
        $stmt = $this->pdo->query('SELECT id, codigo, nombre, edad, turno_id, tipo  FROM medicos');
        $medicos = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Obtener turno del médico
            $turno = $this->getTurnoById($row['turno_id']);

            // Determinar el tipo de médico
            if ($row['tipo'] === 'Familia') {
                $datosFamilia = $this->getDatosFamilia($row['id']);
                $medicos[] = new Familia($row['codigo'], $row['nombre'], $row['edad'], $turno, $datosFamilia['numPacientes']);
            } else {
                $datosUrgencia = $this->getDatosUrgencia($row['id']);
                $medicos[] = new Urgencia($row['codigo'], $row['nombre'], $row['edad'], $turno, $datosUrgencia['unidad']);
            }
        }

        return $medicos;
    }

    
}
