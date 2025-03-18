<?php
class Coche{
    private String $matricula;
    private int $velocidad;

    public function __construct(String $matricula, int $velocidad){
        $this->matricula = $matricula;
        $this->velocidad = $velocidad;
    }

    public function acelera($aumento){
        $this->velocidad = $this->velocidad + $aumento;
    }

    public function frena($decremento){
        do
            
        $this->velocidad = $this->velocidad - $decremento;
    }

    
}