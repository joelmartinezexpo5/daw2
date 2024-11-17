<?php
namespace App\Classes;
class Alimentacion extends Producto{
    private $mesCaducidad;
    private $anioCaducidad;

    public function __construct($codigo, $precio, $nombre, $mesCaducidad, $anioCaducidad, $categoria){
        parent::__construct($codigo, $precio, $nombre, $categoria);
        $this->mesCaducidad = $mesCaducidad;
        $this->anioCaducidad = $anioCaducidad;
    }

    public function __toString(){
        return parent::__toString() . ", Caduca: $this->mesCaducidad/$this->anioCaducidad";
    }
}