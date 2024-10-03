<?php
class Helicoptero extends ElementoVolador {
    private $propietario;
    private $nRotor;

    public function __construct($nombre, $numAlas, $numMotores, $propietario, $nRotor) {
        parent::__construct($nombre, $numAlas, $numMotores);
        $this->propietario = $propietario;
        $this->nRotor = $nRotor;
    }

    // Getters y setters
    public function getPropietario() {
        return $this->propietario;
    }

    public function getnRotor() {
        return $this->nRotor;
    }

    public function volar($altitud) {
        if ($altitud > 100 * $this->nRotor) {
            echo "Error: Altitud fuera del rango permitido por los rotores.<br>";
            return;
        }

        echo "Despegue iniciado...<br>";
        while ($this->getAltitud() < $altitud) {
            $this->setAltitud($this->getAltitud() + 20);
            echo "Subiendo... Altitud actual: " . $this->getAltitud() . " metros.<br>";
        }
        echo "Altitud objetivo alcanzada: " . $this->getAltitud() . " metros.<br>";
    }

    public function mostrarInformacion() {
        echo "Helicóptero del propietario: {$this->propietario}, Nombre: {$this->getNombre()}, Número de rotores: {$this->nRotor}, Altitud actual: {$this->getAltitud()} metros, Velocidad: {$this->getVelocidad()} km/h<br>";
    }
}
?>
