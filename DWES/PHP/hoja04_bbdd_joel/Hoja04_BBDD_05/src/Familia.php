<?php
namespace App;

class Familia extends Medico {
    private $numPacientes;
    private $unidad;

    public function __construct($codigo, $nombre, $edad, Turno $turno, $numPacientes, $unidad) {
        parent::__construct($codigo, $nombre, $edad, $turno);
        $this->numPacientes = $numPacientes;
        $this->unidad = $unidad;
    }

    public function getNumPacientes() {
        return $this->numPacientes;
    }

    public function getUnidad() {
        return $this->unidad;
    }

    public function toString() {
        return parent::toString() . ", Número de pacientes: $this->numPacientes, Unidad: $this->unidad";
    }

    public function getTipo() {
        return "Familia";
    }
}
