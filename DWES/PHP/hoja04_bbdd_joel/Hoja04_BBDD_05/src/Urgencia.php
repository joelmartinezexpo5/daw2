<?php
namespace App;

class Urgencia extends Medico {
    private $unidad;

    public function __construct($codigo, $nombre, $edad, Turno $turno, $unidad) {
        parent::__construct($codigo, $nombre, $edad, $turno);
        $this->unidad = $unidad;
    }

    public function getUnidad() {
        return $this->unidad;
    }

    public function toString() {
        return parent::toString() . ", Unidad: $this->unidad";
    }

    public function getTipo() {
        return "Urgencia";
    }
}
