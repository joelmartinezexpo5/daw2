<?php
namespace Ejercicio03\clases;

use Ejercicio03\Interfaces\IUsuario;
use Ejercicio03\Models\ModeloUsuario;

class Usuario{

    public function __construct(private IUsuario $interface){}

    public function registrar(ModeloUsuario $usuario):bool{
        return $this->interface->registrar($usuario);
    }
    public function loguearse(ModeloUsuario $usuario):bool{
        return $this->interface->loguearse($usuario);
    }

}