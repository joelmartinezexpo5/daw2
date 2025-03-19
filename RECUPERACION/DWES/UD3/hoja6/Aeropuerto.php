<?php
include 'ElementoVolador.php';
include 'Avion.php';
include 'Helicoptero.php';

class Aeropuerto{
    private $elementosVoladores = [];

    public function insertar(ElementoVolador $elemento){
        $this->elementosVoladores[] = $elemento;
    }

    public function buscar($nombre){
        foreach($this->elementosVoladores as $elemento){
            if($elemento->getNombre() == $nombre){
                $elemento->mostrarInformacion();
                return;
            }
        }
        echo "Elemento '$nombre' no encontrado.\n";
    }

    public function listarCompania($compania){
        foreach($this->elementosVoladores as $elemento){
            if($elemento instanceof Avion && $elemento->getCompaniaAerea() == $compania){
                $elemento->mostrarInformacion();
            }
        }
    }

    public function rotores($numRotores){
        foreach($this->elementosVoladores as $elemento){
            if($elemento instanceof Helicoptero && $elemento->getNRotor() == $numRotores){
                $elemento->mostrarInformacion();
            }
        }
    }

    public function despegar($nombre, $altitud, $velocidad){
        foreach($this->elementosVoladores as $elemento){
            if($elemento->getNombre() == $nombre){
                $elemento->acelerar($velocidad);
                $elemento->volar($altitud);
                return $elemento;
            }
        }
    }
}