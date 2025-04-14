<?php
abstract class Producto {
    protected $codigo;
    protected $precio;
    protected $nombre;
    protected $categoria;

    public function __construct($codigo, $precio, $nombre, Categoria $categoria) {
        $this->codigo = $codigo;
        $this->precio = $precio;
        $this->nombre = $nombre;
        $this->categoria = $categoria;
    }

    abstract public function __toString();
}
