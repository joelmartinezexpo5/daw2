<?php
class Empleado {
    protected string $nombre;
    protected float $sueldoBase;

    public function __construct(string $nombre, float $sueldoBase) {
        $this->nombre = $nombre;
        $this->sueldoBase = $sueldoBase;
    }

    public function getSueldo(): float {
        return $this->sueldoBase;
    }

    public function getNombre(): string {
        return $this->nombre;
    }
}