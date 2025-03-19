<?php
include_once 'Medico.php';

class MedicoFamilia extends Medico {
    private $num_pacientes;

    public function __construct($nombre, $edad, $turno, $num_pacientes) {
        parent::__construct($nombre, $edad, $turno);
        $this->num_pacientes = $num_pacientes;
    }

    public function mostrarDatos() {
        echo "<p>Familia - Nombre: {$this->nombre}, Edad: {$this->edad}, Turno: {$this->turno}, Pacientes: {$this->num_pacientes}</p>";
    }

    public function getNumPacientes() {
        return $this->num_pacientes;
    }
}