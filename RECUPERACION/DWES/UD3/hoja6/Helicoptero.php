<?php
include_once 'ElementoVolador.php';

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
            echo "Altitud no permitida.\n";
            return;
        }
        while($this->altitud <= $altitud){
            $this->altitud += 20;
            echo "Subiendo... Actitud actual: ".$this->altitud." metros.\n";
        }
    }

    public function mostrarInformacion(){
        echo "Helicoptero {$this->nombre}, Propietario: {$this->propietario}, Altitud: {$this->altitud}, Velocidad: {$this->velocidad}\n";
    }
}
