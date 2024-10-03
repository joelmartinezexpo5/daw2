<?php
class Aeropuerto {
    private $elementosVoladores;

    public function __construct() {
        $this->elementosVoladores = [];
    }

    public function insertar(ElementoVolador $elemento) {
        $this->elementosVoladores[] = $elemento;
    }

    public function buscar($nombre) {
        foreach ($this->elementosVoladores as $elemento) {
            if ($elemento->getNombre() == $nombre) {
                $elemento->mostrarInformacion();
                return;
            }
        }
        echo "No se ha encontrado el elemento volador con nombre: $nombre.<br>";
    }

    public function listarCompania($compania) {
        $encontrado = false;
        foreach ($this->elementosVoladores as $elemento) {
            if ($elemento instanceof Avion && $elemento->getCompaniaAerea() == $compania) {
                $elemento->mostrarInformacion();
                $encontrado = true;
            }
        }
        if (!$encontrado) {
            echo "No se han encontrado aviones de la compañía: $compania.<br>";
        }
    }

    public function rotores($nRotor) {
        $encontrado = false;
        foreach ($this->elementosVoladores as $elemento) {
            if ($elemento instanceof Helicoptero && $elemento->getnRotor() == $nRotor) {
                $elemento->mostrarInformacion();
                $encontrado = true;
            }
        }
        if (!$encontrado) {
            echo "No se han encontrado helicópteros con $nRotor rotores.<br>";
        }
    }

    public function despegar($nombre, $altitud, $velocidad) {
        foreach ($this->elementosVoladores as $elemento) {
            if ($elemento->getNombre() == $nombre) {
                $elemento->acelerar($velocidad);
                $elemento->volar($altitud);
                return $elemento;
            }
        }
        echo "No se ha encontrado el elemento volador con nombre: $nombre.<br>";
    }
}
?>
