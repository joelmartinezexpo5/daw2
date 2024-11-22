<?php
namespace App\Classes;

class Producto
{
    private $nombre;
    private $precio;
    private $descripcion;
    private $imagen;

    public function __construct($nombre, $precio, $descripcion, $imagen)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getImagen(){
        return $this->imagen;
    }
}
?>
