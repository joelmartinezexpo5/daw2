<?php
namespace Ejercicio03\Interfaces;

use Ejercicio03\Models\ModeloUsuario;

interface IUsuario{
    public function registrar(ModeloUsuario $usuario):bool;
    public function loguearse(ModeloUsuario $usuario):bool;
}