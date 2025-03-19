<?php
include_once 'ElementoVolador.php';

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
            echo "Altitud no permitida.\n";
            return;
        }
        if ($this->velocidad < 150) {
            echo "Velocidad insuficiente para volar.\n";
            return;
        }
        while ($this->altitud < $altitud) {
            $this->altitud += 100;
            echo "Subiendo... Altitud actual: {$this->altitud} metros.\n";
        }
    }

    public function mostrarInformacion() {
        echo "Avión {$this->nombre}, Compañía: {$this->companiaAerea}, Altitud: {$this->altitud}, Velocidad: {$this->velocidad}\n";
    }
}