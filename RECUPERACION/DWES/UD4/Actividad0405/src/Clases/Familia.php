<?php
namespace Ejercicio0405\Clases;

class Familia{
    private $id;
    private $nombre;

    function __construct($id,$nombre){
        $this->id=$id;
        $this->nombre=$nombre;
    }
    function __get($tipo){
        return $this->$tipo;
  }
}
?>