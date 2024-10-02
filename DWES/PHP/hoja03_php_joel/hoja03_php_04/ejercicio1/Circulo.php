<?php
class Circulo {
    // Atributo privado
    private float $radio;

    // Constructor
    public function __construct(float $radio) {
        $this->radio = $radio;
    }

    // Método setRadio
    public function setRadio(float $radio): void {
        $this->radio = $radio;
    }

    // Método getRadio
    public function getRadio():float {
        return $this->radio;
    }

    // Método mágico __set
    public function __set($name, $value):void {
        $this->$name=$value;
    }

    // Método mágico __get
    public function __get($name) {
        return $this->$name;
    }
}
?>
