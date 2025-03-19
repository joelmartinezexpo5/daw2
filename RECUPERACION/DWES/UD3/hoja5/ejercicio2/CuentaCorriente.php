<?php
include_once 'Cuenta.php';

class CuentaCorriente extends Cuenta{
    private Float $cuota_mantenimiento;

    public function __construct($numero, $titular, $saldo, $cuota_mantenimiento){
        parent::__construct($numero, $titular, $saldo - $cuota_mantenimiento);
        $this->cuota_mantenimiento = $cuota_mantenimiento;
    }

    public function reintegro($cantidad){
        if($this->saldo >= 20){
            parent::reintegro($cantidad);
        }
    }

    public function mostrar() {
        parent::mostrar();
        echo "<p>Cuota de mantenimiento: {$this->cuota_mantenimiento} €</p>";
    }
}