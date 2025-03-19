<?php
abstract class Medico {
    protected $nombre;
    protected $edad;
    protected $turno; // "mañana" o "tarde"

    public function __construct($nombre, $edad, $turno) {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->turno = $turno;
    }

    abstract public function mostrarDatos();
    
    public function getEdad() {
        return $this->edad;
    }
    
    public function getTurno() {
        return $this->turno;
    }
}
?>