<?php
require_once 'Producto.php';

class Electronica extends Producto {
    private $plazoGarantia;

    public function __construct($codigo, $precio, $nombre, $plazoGarantia, Categoria $categoria) {
        parent::__construct($codigo, $precio, $nombre, $categoria);
        $this->plazoGarantia = $plazoGarantia;
    }

    public function __toString() {
        return "Electrónica - {$this->nombre}, Código: {$this->codigo}, Precio: {$this->precio}, Garantía: {$this->plazoGarantia} meses, {$this->categoria}";
    }
}
