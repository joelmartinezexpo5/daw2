<?php
trait InformacionPersonal {
    private $nombre;
    private $edad;
    private $direccion;

    public function actualizarInformacionPersonal($nombre, $edad, $direccion) {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->direccion = $direccion;
    }

    public function mostrarInformacionPersonal() {
        echo "Nombre: $this->nombre<br>";
        echo "Edad: $this->edad<br>";
        echo "Dirección: $this->direccion<br>";
    }
}
?>
