<?php
abstract class ElementoVolador implements Volador {
    private $nombre;
    private $numAlas;
    private $numMotores;
    private $altitud;
    private $velocidad;

    public function __construct($nombre, $numAlas, $numMotores) {
        $this->nombre = $nombre;
        $this->numAlas = $numAlas;
        $this->numMotores = $numMotores;
        $this->altitud = 0; // Se inicializa a 0
        $this->velocidad = 0; // Se inicializa a 0
    }

    // Getters y setters
    public function getNombre() {
        return $this->nombre;
    }

    public function getAltitud() {
        return $this->altitud;
    }

    public function setAltitud($altitud) {
        $this->altitud = $altitud;
    }

    public function getVelocidad() {
        return $this->velocidad;
    }

    public function setVelocidad($velocidad) {
        $this->velocidad = $velocidad;
    }

    public function volando() {
        return $this->altitud > 0;
    }

    // Método de la interfaz Volador
    public function acelerar($velocidad) {
        $this->velocidad = $velocidad;
    }

    // Métodos abstractos que serán implementados en las clases hijas
    abstract public function volar($altitud);
    abstract public function mostrarInformacion();
}
?>
