<?php
include_once 'Medico.php';

class MedicoUrgencia extends Medico {
    private $unidad;

    public function __construct($nombre, $edad, $turno, $unidad) {
        parent::__construct($nombre, $edad, $turno);
        $this->unidad = $unidad;
    }

    public function mostrarDatos() {
        echo "<p>Urgencia - Nombre: {$this->nombre}, Edad: {$this->edad}, Turno: {$this->turno}, Unidad: {$this->unidad}</p>";
    }
}