<?php
namespace App;

class Familia extends Medico {
    private $numPacientes;

    public function __construct($codigo, $nombre, $edad, Turno $turno, $numPacientes) {
        parent::__construct($codigo, $nombre, $edad, $turno);
        $this->numPacientes = $numPacientes;
    }

    public function getNumPacientes() {
        return $this->numPacientes;
    }

    public function toString() {
        return parent::toString() . ", Número de pacientes: $this->numPacientes";
    }

    public function getTipo() {
        return "Familia";
    }
}
