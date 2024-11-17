<?php
namespace App\Classes;
class Electronica extends Producto{
    private $plazoGarantia;

    public function __construct($codigo, $precio, $nombre, $plazoGarantia, $categoria){
        parent::__construct($codigo, $precio, $nombre,  $categoria);
        $this->plazoGarantia = $plazoGarantia;
    }

    public function __toString(){
        return parent::__toString() . ", Garantia: $this->plazoGarantia meses";
    }
}