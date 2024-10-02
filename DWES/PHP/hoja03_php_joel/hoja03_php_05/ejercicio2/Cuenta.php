<?php
    class Cuenta{

        public String $numero;
        public String $titular;
        public float $saldo;

        public function __construct(string $numero, string $titular, float $saldo = 0){
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
            if ($this->saldo > $cantidad){
                return true;
            }else{
                return false;
            }
        }

        public function mostrar(){
            echo "<h4>Cuenta bancaria de ". $this->titular. "</h4>";
            echo "Numero de cuenta: ". $this->numero."<br>";
            echo "Saldo de la cuenta: ". $this->saldo. "<br>";
        }

    }
?>