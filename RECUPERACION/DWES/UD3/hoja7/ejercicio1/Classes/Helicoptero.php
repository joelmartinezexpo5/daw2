<?php
namespace Classes;

use Classes\ElementoVolador;

class Helicoptero extends ElementoVolador{
    private String $propietario;
    private int $nRotor;

    public function __construct($nombre, $numMotores, $propietario, $nRotor) {
        parent::__construct($nombre, 0, $numMotores);
        $this->propietario = $propietario;
        $this->nRotor = $nRotor;
    }

    public function getPropietario(){
        return $this->propietario;
    }

    public function getNRotor(){
        return $this->nRotor;
    }

    public function volar($altitud){
        if($altitud > ($this->nRotor * 100)){
            $this->mostrarMensaje("Altitud no permitida.<br>");
            return;
        }
        while($this->altitud <= $altitud){
            $this->altitud += 20;
            $this->mostrarMensaje("Subiendo... Actitud actual: ".$this->altitud." metros.<br>");
        }
    }

    public function mostrarInformacion(){
        $this->mostrarMensaje("Helicoptero {$this->nombre}, Propietario: {$this->propietario}, Altitud: {$this->altitud}, Velocidad: {$this->velocidad}<br>");
    }
}
