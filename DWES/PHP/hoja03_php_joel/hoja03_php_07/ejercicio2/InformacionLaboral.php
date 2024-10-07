<?php
trait InformacionLaboral {
    private $codigoEmpleado;
    private $salario;

    public function actualizarInformacionLaboral($codigoEmpleado, $salario) {
        $this->codigoEmpleado = $codigoEmpleado;
        $this->salario = $salario;
    }

    public function mostrarInformacionLaboral() {
        echo "Código de Empleado: $this->codigoEmpleado<br>";
        echo "Salario: $this->salario<br>";
    }
}
?>
