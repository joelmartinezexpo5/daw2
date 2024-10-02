<?php
    class Cuenta{

        public String $numero;
        public String $titular;
        public float $saldo;

        public function __construct(string $numero, string $titular, float $saldo){
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

        public function esPreferencia($cantidad){
            if ($this->saldo > $cantidad){
                return true;
            }else{
                return false;
            }
        }

        public function mostrar(){
            echo "<h1>Cuenta bancaria de ". $this->titular;
        }

    }
?>