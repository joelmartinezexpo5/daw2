<?php
class Circulo{
    private int $radio;

    public function __construct(int $radio){
        $this->radio = $radio;
    }

    public function setRadio(int $radio){
        $this->radio = $radio;
    }

    public function getRadio(){
        return $this->radio;
    }

    public function __get($radio){
        return $this->radio;
    }

    public function __set($radio, $valor){
        $this->radio = $valor;
    }
}