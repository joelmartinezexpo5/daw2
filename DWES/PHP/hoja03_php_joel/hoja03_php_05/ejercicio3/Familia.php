<?php
    require_once "Medico.php";
    class Familia extends Medico{
        private int $num_pacientes;

        public function __construct($nombre, $edad, $turno, int $num_pacientes){
            parent::__construct($nombre, $edad, $turno);
            $this->num_pacientes = $num_pacientes;
        }

        public function getNumPacientes(){
            return $this->num_pacientes;
        }

        public function mostrarDatos(){
            echo "Medico: $this->nombre, Edad: $this->edad, Turno: $this->turno, Numero de pacientes: $this->num_pacientes <br>";
        }
    }
?>