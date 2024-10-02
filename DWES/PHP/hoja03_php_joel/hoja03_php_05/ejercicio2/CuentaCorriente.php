<?php
    class CuentaCorriente extends Cuenta{
        public float $cuota_mantenimiento;

        public function __construct($numero, $titular, $saldo = 0, $cuota_mantenimiento = 0) {
            parent::__construct($numero, $titular, $saldo);
            $this->cuota_mantenimiento = $cuota_mantenimiento;

            $this->saldo -= $cuota_mantenimiento;
        }

        public function reintegro($cantidad) {
            if($this->saldo > 20){
                $this->saldo -= $cantidad;
            }
        }

        public function mostrar(){
            parent::mostrar(); 
            echo "Cuota de mantenimiento: ". $this->cuota_mantenimiento;
        }
    }
?>