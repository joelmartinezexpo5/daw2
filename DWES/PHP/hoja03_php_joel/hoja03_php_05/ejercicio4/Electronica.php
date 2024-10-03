<?php
require_once 'Producto.php';

class Electronica extends Producto {
    private $plazo_garantia;

    public function __construct($codigo, $nombre, $precio, $plazo_garantia) {
        parent::__construct($codigo, $nombre, $precio);
        $this->plazo_garantia = $plazo_garantia;
    }

    // Getters y Setters
    public function getPlazoGarantia() {
        return $this->plazo_garantia;
    }

    // Método para mostrar los datos del producto electrónico
    public function mostrar() {
        echo "Producto de Electrónica: Código: {$this->codigo}, Nombre: {$this->nombre}, Precio: {$this->precio}€, Plazo de garantía: {$this->plazo_garantia} años<br>";
    }
}
?>
