<?php
require_once 'Producto.php';

class Alimentacion extends Producto {
    private $mesCaducidad;
    private $anioCaducidad;

    public function __construct($codigo, $precio, $nombre, $mes, $anio, Categoria $categoria) {
        parent::__construct($codigo, $precio, $nombre, $categoria);
        $this->mesCaducidad = $mes;
        $this->anioCaducidad = $anio;
    }

    public function __toString() {
        return "Alimentación - {$this->nombre}, Código: {$this->codigo}, Precio: {$this->precio}, Caduca: {$this->mesCaducidad}/{$this->anioCaducidad}, {$this->categoria}";
    }
}
