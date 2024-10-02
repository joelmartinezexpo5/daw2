<?php
    class Empleado{
    
        private $sueldoBase;

        public function __construct($sueldoBase){
            $this->sueldoBase = $sueldoBase;
        }

        public function getSueldoBase(){
            return $this->sueldoBase;
        }
    }
?>