<?php
namespace App\Classes;
class Producto{
    protected $codigo;
    protected $precio;
    protected $nombre;
    protected $categoria;

    public function __construct($codigo, $precio, $nombre, $categoria){
        $this->codigo = $codigo;
        $this->precio = $precio;
        $this->nombre = $nombre;
        $this->categoria = $categoria;
    }

    public function __toString(){
        return "Producto: $this->nombre, Precio: $this->precio, Categoria: {$this->categoria->getNombre()}";
    }
}