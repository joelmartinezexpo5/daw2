<?php
namespace App;

class Turno {
    private $id;
    private $nombre;

    public function __construct($id, $nombre) {
        $this->id = $id;
        $this->nombre = $nombre;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function toString() {
        return "Turno: $this->nombre";
    }
}
