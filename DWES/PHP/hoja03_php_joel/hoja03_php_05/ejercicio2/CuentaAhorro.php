<?php
    class CuentaAhorro extends Cuenta{

        private float $comision_apertura;
        private float $intereses;

        public function __construct($numero, $titular, $saldo = 0, $comision_apertura = 0, $intereses = 0) {
            parent::__construct($numero, $titular, $saldo);
            $this->comision_apertura = $comision_apertura;
            $this->intereses = $intereses;
            $this->saldo -= $comision_apertura;
        }

        public function aplicaInteres(){

            $incremento = $this->saldo * ($this->intereses / 100);
            $this->saldo += $incremento;
        }

        public function mostrar(){
            parent::mostrar();
            echo "Comision apertura: ". $this->comision_apertura ."<br>
            Intereses: ".$this->intereses;
        }
    }
?>