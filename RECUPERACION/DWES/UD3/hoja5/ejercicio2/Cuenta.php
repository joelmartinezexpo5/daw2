<?php
class Cuenta{
    protected int $numero;
    protected String $titular;
    protected Float $saldo;

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
        return $this->saldo > $cantidad;
    }

    public function mostrar(){
        echo "<h3>Datos de la Cuenta</h3>";
        echo "<p>Número: {$this->numero}</p>";
        echo "<p>Titular: {$this->titular}</p>";
        echo "<p>Saldo: {$this->saldo} €</p>";
    }
}