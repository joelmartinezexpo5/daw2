<?php

namespace Ejercicio2\Classes;
use Ejercicio2\Interfaces\Encendible;

class Bombilla implements Encendible{
    private int $horasDeVida;

    public function __construct(int $horasDeVida){
        $this->horasDeVida = $horasDeVida;
    }

    public function encender():void{
        if($this->horasDeVida > 1){
            $this->horasDeVida = $this->horasDeVida - 2;
        }
        echo 'La bombilla se ha encendido';
    }

    public function apagar(): void{
        echo 'La bombilla se ha apagado';
    }
}