<?php
require_once 'Empleado.php';

class Encargado extends Empleado {
    private const BONUS = 1.15; // 15% más de sueldo

    public function getSueldo(): float {
        return $this->sueldoBase * self::BONUS;
    }
}