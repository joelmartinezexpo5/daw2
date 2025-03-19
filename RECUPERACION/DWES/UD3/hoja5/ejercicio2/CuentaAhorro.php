<?php
include_once 'Cuenta.php';
include_once 'CuentaCorriente.php';

class CuentaAhorro extends Cuenta{
    private $comision_apertura;
    private $intereses;

    public function __construct($numero, $titular, $saldo, $comision_apertura, $intereses) {
        parent::__construct($numero, $titular, $saldo - $comision_apertura);
        $this->comision_apertura = $comision_apertura;
        $this->intereses = $intereses;
    }

    public function aplicaInteres() {
        $this->saldo += $this->saldo * ($this->intereses / 100);
    }

    public function mostrar() {
        parent::mostrar();
        echo "<p>Comisión de apertura: {$this->comision_apertura} €</p>";
        echo "<p>Intereses: {$this->intereses}%</p>";
    }
}