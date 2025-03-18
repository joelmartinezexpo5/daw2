<?php
class Cuenta{
    private int $numero;
    private String $titular;
    private Float $saldo;

    public function __construct(int $numero, String $titular, Float $saldo){
        $this->numero = $numero;
        $this->titular = $titular;
        $this->saldo = $saldo;
    }

    public function ingreso($cantidad){
        $this->saldo += $cantidad;
    }

    public function reintegro($cantidad){
        $this->saldo -= $cantidad;
    }

    public function esPreferencial($cantidad){
        if($this->saldo > $cantidad){
            return true;
        } else{
            return false;
        }
    }

    public function mostrar(){
        return '
            <h1>Cuenta de'. $this->titular. '</h1>
            <br>
            Numero de cuenta:'.$this->numero.'
            <br>
            Saldo: '.$this->saldo;
    }
}