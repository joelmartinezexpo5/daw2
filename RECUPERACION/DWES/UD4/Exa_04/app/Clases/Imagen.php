<?php

namespace Producto\Clases;

class Imagen{
    
    private int $id;
    private string $nombre;
    private string $url;
    
    public function __construct(string $nombre,string $url,int $id=0){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->url = $url;
    }

    ///////////////GETTER///////////////

    public function getID():int{
        return $this->id;
    }
    public function getNombre():string{
        return $this->nombre;
    }
    public function getURL():string{
        return $this->url;
    }

    ///////////////SETTER///////////////
    public function setID(int $id):void{
        $this->id = $id;
    }
    public function setNombre(string $nombre):void{
        $this->nombre = $nombre;
    }
    public function setURL(string $url):void{
        $this->url = $url;
    }
}