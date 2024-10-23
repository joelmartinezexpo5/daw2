<?php

namespace Ejercicio2\Classes;
use Ejercicio2\Interfaces\Encendible;

class Coche implements Encendible{

    private int $gasolina;
    private int $bateria;
    private bool $estado;

    public function __construct(){

        $this->gasolina = 0;
        $this->bateria = 10;
        $this->estado = false;
    }

    public function encender(): void{
        if($this->gasolina > 0 && $this->bateria > 0 && !$this->estado){
            $this->estado = true;
            --$this->gasolina;
            --$this->bateria;
        }
        echo 'El coche se ha encendido';      
    }

    public function apagar(): void{
        if($this->estado){
            $this->estado = false;
            echo 'El coche se ha apagado';
        }else{
            echo 'El coche ya esta apagado';
        }
        
    }

    public function repostar($litros): void{
        $this->gasolina += $litros;
    }
}