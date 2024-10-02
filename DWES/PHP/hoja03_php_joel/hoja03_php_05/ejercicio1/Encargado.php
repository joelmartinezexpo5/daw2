<?php
    class Encargado extends Empleado{
        public function getSueldo(){
            $sueldoBase = parent::getSueldoBase();
            $sueldoEncargado = $sueldoBase * 1.5;

            return $sueldoEncargado;
        }
    }
?>