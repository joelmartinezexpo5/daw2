<?php
class Coche {
    // Atributos privados
    private $matricula;
    private $velocidad;

    // Constructor que inicializa la matrícula y la velocidad
    public function __construct($matricula, $velocidad) {
        $this->matricula = $matricula;
        $this->velocidad = $velocidad;
    }

    // Método para incrementar la velocidad
    public function acelera($incremento) {
        $this->velocidad += $incremento;
        if ($this->velocidad > 120) {
            $this->velocidad = 120;
        }
    }

    // Método para disminuir la velocidad
    public function frena($decremento) {
        $this->velocidad -= $decremento;
        if ($this->velocidad < 0) {
            $this->velocidad = 0;
        }
    }

    // Método para mostrar la matrícula y la velocidad del coche
    public function mostrar() {
        echo "Matrícula: " . $this->matricula . "<br>";
        echo "Velocidad actual: " . $this->velocidad . " km/h<br>";
    }
}
?>
