<?php
include_once 'Volador.php';

abstract class ElementoVolador implements Volador{

    protected String $nombre;
    protected int $numAlas;
    protected int $numMotores;
    protected Float $altitud;
    protected Float $velocidad;

    public function __construct($nombre, $numAlas, $numMotores){
        $this->nombre = $nombre;
        $this->numAlas = $numAlas;
        $this->numMotores = $numMotores;
        $this->altitud = 0;
        $this->velocidad = 0;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getNumAlas(){
        return $this->numAlas;
    }

    public function getNumMotores(){
        return $this->numMotores;
    }

    public function getAltitud(){
        return $this->altitud;
    }

    public function getVelocidad(){
        return $this->velocidad;
    }

    public function setAltitud($altitud){
        $this->altitud = $altitud;
    }

    public function setVelocidad($velocidad){
        $this->velocidad = $velocidad;
    }

    public function volando(){
        return $this->altitud > 0;
    }

    public function acelerar($velocidad){
        $this->velocidad = $velocidad;
    }

    abstract public function volar($altitud);

    abstract public function mostrarInformacion();
}