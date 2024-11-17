<?php
class Alimentacion extends Producto {
    private $mesCaducidad;
    private $anioCaducidad;

    public function __construct($codigo, $precio, $nombre, $mesCaducidad, $anioCaducidad, $categoria) {
        parent::__construct($codigo, $precio, $nombre, $categoria);
        $this->mesCaducidad = $mesCaducidad;
        $this->anioCaducidad = $anioCaducidad;
    }

    public function getMesCaducidad() {
        return $this->mesCaducidad;
    }

    public function getAnioCaducidad() {
        return $this->anioCaducidad;
    }

    public function setMesCaducidad($mesCaducidad) {
        $this->mesCaducidad = $mesCaducidad;
    }

    public function setAnioCaducidad($anioCaducidad) {
        $this->anioCaducidad = $anioCaducidad;
    }

    public function toString() {
        return parent::toString() . ", Caducidad: " . $this->mesCaducidad . "/" . $this->anioCaducidad;
    }
}
