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
        if($this->velocidad - $decremento < 0){
            $this->velocidad = 0;
        }elseif($this->velocidad - $decremento > 120){
            $this->velocidad = 120;
        }else{
            $this->velocidad = $this->velocidad - $decremento;
        }
    }

    public function getVelocidad(){
        return $this->velocidad;
    }

    public function getMatricula(){
        return $this->matricula;
    }

    public function __toString(){
        return "Matricula: " . $this->matricula . " Velocidad: " . $this->velocidad;
    }
}