<?php

namespace Producto\Clases;

class Producto{
    
    private int $id;
    private string $nombre;
    private string $descripcion;
    private float $precio;
    private Familia $familia;
    private Imagen $imagen;

    public function __construct(
        string $nombre,
        string $descripcion,
        float $precio,
        Familia $familia,
        Imagen $imagen,
        int $id = 0,
    ){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->familia = $familia;
        $this->imagen = $imagen;
    }

    ///////////////GETTER///////////////

    public function getID():int{
        return $this->id;
    }
    public function getNombre():string{
        return $this->nombre;
    }
    public function getDescripcion():string{
        return $this->descripcion;
    }
    public function getPrecio():float{
        return $this->precio;
    }
    public function getFamilia():Familia{
        return $this->familia;
    }
    public function getImagen():Imagen{
        return $this->imagen;
    }

    ///////////////SETTER///////////////
    public function setID(int $id):void{
        $this->id = $id;
    }
    public function setNombre(string $nombre):void{
        $this->nombre = $nombre;
    }
    public function setDescripcion(string $descripcion):void{
        $this->descripcion = $descripcion;
    }
    public function setPrecio(float $precio):void{
        $this->precio = $precio;
    }
    public function setFamilia(Familia $familia):void{
        $this->familia = $familia;
    }
    public function setImagen(Imagen $imagen):void{
        $this->imagen = $imagen;
    }
}