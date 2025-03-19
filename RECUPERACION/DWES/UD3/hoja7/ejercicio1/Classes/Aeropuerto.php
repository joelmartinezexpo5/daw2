<?php
namespace Classes;

use Classes\ElementoVolador;
use Classes\Avion;
use Classes\Helicoptero;
use Traits\Mensaje;

class Aeropuerto{
    use Mensaje;

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
        $this->mostrarMensaje("Elemento '$nombre' no encontrado.<br>");
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