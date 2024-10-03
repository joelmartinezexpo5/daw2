<?php
    abstract class Medico{

        protected String $nombre;
        protected int $edad;
        protected String $turno;

        public function __construct(String $nombre, int $edad, String $turno){
            $this->nombre = $nombre;
            $this->edad = $edad;
            $this->turno = $turno;
        }

        abstract public function mostrarDatos();

        public function getTurno(){
            return $this->turno;
        }

        public function getEdad(){
            return $this->edad;
        }
    }
?>