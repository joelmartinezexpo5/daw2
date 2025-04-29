<?php

namespace Producto\Clases;

class Familia{
    
    private string $codigo;
    private string $nombre;

    public function __construct(string $codigo,string $nombre){
        $this->codigo = $codigo;
        $this->nombre = $nombre;
    }

    ///////////////GETTER///////////////

    public function getCodigo():string{
        return $this->codigo;
    }
    public function getNombre():string{
        return $this->nombre;
    }
    

    ///////////////SETTER///////////////
    public function setID(string $codigo):void{
        $this->codigo = $codigo;
    }
    public function setNombre(string $nombre):void{
        $this->nombre = $nombre;
    }
    
}