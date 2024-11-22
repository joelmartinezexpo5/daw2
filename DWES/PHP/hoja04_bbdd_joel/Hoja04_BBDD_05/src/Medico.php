<?php
namespace App;

abstract class Medico {
    protected $codigo;
    protected $nombre;
    protected $edad;
    protected $turno;

    public function __construct($codigo, $nombre, $edad, Turno $turno) {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->turno = $turno;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function getTurno() {
        return $this->turno;
    }

    public function toString() {
        return "Código: $this->codigo, Nombre: $this->nombre, Edad: $this->edad, Turno: " . $this->turno->getNombre();
    }

    abstract public function getTipo();
}
