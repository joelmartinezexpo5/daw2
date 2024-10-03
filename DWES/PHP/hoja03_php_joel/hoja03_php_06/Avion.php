<?php
class Avion extends ElementoVolador {
    private $companiaAerea;
    private $fechaAlta;
    private $altitudMaxima;

    public function __construct($nombre, $numAlas, $numMotores, $companiaAerea, $fechaAlta, $altitudMaxima) {
        parent::__construct($nombre, $numAlas, $numMotores);
        $this->companiaAerea = $companiaAerea;
        $this->fechaAlta = $fechaAlta;
        $this->altitudMaxima = $altitudMaxima;
    }

    // Getters y setters
    public function getCompaniaAerea() {
        return $this->companiaAerea;
    }

    public function getAltitudMaxima() {
        return $this->altitudMaxima;
    }

    public function volar($altitud) {
        if ($altitud < 0 || $altitud > $this->altitudMaxima) {
            echo "Error: Altitud fuera de rango.<br>";
            return;
        }
        if ($this->getVelocidad() < 150) {
            echo "Error: Velocidad insuficiente para volar.<br>";
            return;
        }

        echo "Despegue iniciado...<br>";
        while ($this->getAltitud() < $altitud) {
            $this->setAltitud($this->getAltitud() + 100);
            echo "Subiendo... Altitud actual: " . $this->getAltitud() . " metros.<br>";
        }
        echo "Altitud objetivo alcanzada: " . $this->getAltitud() . " metros.<br>";
    }

    public function mostrarInformacion() {
        echo "Avión de la compañía: {$this->companiaAerea}, Nombre: {$this->getNombre()}, Altitud máxima: {$this->altitudMaxima} metros, Altitud actual: {$this->getAltitud()} metros, Velocidad: {$this->getVelocidad()} km/h<br>";
    }
}
?>
