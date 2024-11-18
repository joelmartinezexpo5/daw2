<?php
namespace App;
class Producto {
    protected $codigo;
    protected $precio;
    protected $nombre;
    protected $categoria;

    public function __construct($codigo, $precio, $nombre, $categoria) {
        $this->codigo = $codigo;
        $this->precio = $precio;
        $this->nombre = $nombre;
        $this->categoria = $categoria;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function toString() {
        return "Código: " . $this->codigo . ", Nombre: " . $this->nombre . ", Precio: " . $this->precio . "€, Categoría: " . $this->categoria;
    }
}
