<?php

namespace App;

class Electronica extends Producto {
    private $plazoGarantia;

    public function __construct($codigo, $precio, $nombre, $categoria, $plazoGarantia) {
        parent::__construct($codigo, $precio, $nombre, $categoria); // Llamada al constructor de Producto
        $this->plazoGarantia = $plazoGarantia;
    }

    // Getter para plazo de garantía
    public function getPlazoGarantia() {
        return $this->plazoGarantia;
    }

    // Setter para plazo de garantía
    public function setPlazoGarantia($plazoGarantia) {
        $this->plazoGarantia = $plazoGarantia;
    }

    // Método para mostrar la información del producto
    public function toString() {
        return parent::toString() . ", Plazo de Garantía: " . $this->plazoGarantia . " meses";
    }
}
