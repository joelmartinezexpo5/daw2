<?php
require_once 'Producto.php';

class Alimentacion extends Producto {
    private $mes_caducidad;
    private $año_caducidad;

    public function __construct($codigo, $nombre, $precio, $mes_caducidad, $año_caducidad) {
        parent::__construct($codigo, $nombre, $precio);
        $this->mes_caducidad = $mes_caducidad;
        $this->año_caducidad = $año_caducidad;
    }

    // Getters y Setters
    public function getMesCaducidad() {
        return $this->mes_caducidad;
    }

    public function getAñoCaducidad() {
        return $this->año_caducidad;
    }

    // Método para mostrar los datos del producto de alimentación
    public function mostrar() {
        echo "Producto de Alimentación: Código: {$this->codigo}, Nombre: {$this->nombre}, Precio: {$this->precio}€, Fecha de caducidad: {$this->mes_caducidad}/{$this->año_caducidad}<br>";
    }
}
?>
