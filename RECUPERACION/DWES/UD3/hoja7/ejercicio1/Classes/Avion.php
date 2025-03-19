<?php
namespace Classes;

use Classes\ElementoVolador;

class Avion extends ElementoVolador{
    private $companiaAerea;
    private $fechaAlta;
    private $altitudMaxima;

    public function __construct($nombre, $numAlas, $numMotores, $companiaAerea, $fechaAlta, $altitudMaxima){
        parent::__construct($nombre, $numAlas, $numAlas);
        $this->companiaAerea = $companiaAerea;
        $this->fechaAlta = $fechaAlta;
        $this->altitudMaxima = $altitudMaxima;
    }

    public function getCompaniaAerea(){
        return $this->companiaAerea;
    }

    public function getFechaAlta(){
        return $this->fechaAlta;
    }

    public function getAltitudMaxima(){
        return $this->altitudMaxima;
    }

    public function volar($altitud) {
        if ($altitud < 0 || $altitud > $this->altitudMaxima) {
            $this->mostrarMensaje("Altitud no permitida.<br>");
            return;
        }
        if ($this->velocidad < 150) {
            $this->mostrarMensaje("Velocidad insuficiente para volar.<br>");
            return;
        }
        while ($this->altitud < $altitud) {
            $this->altitud += 100;
            $this->mostrarMensaje("Subiendo... Altitud actual: {$this->altitud} metros.<br>");
        }
    }

    public function mostrarInformacion() {
        $this->mostrarMensaje("Avión {$this->nombre}, Compañía: {$this->companiaAerea}, Altitud: {$this->altitud}, Velocidad: {$this->velocidad}<br>");
    }
}