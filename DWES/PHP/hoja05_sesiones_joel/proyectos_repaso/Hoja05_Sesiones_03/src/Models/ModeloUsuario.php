<?php 
namespace Ejercicio03\Models;

class ModeloUsuario{
    private int $id_usuario;
    private string $nombre;
    private string $contrasenia;

    public function __construct(){}

    public function getId_usuario():int{
        return $this->id_usuario;
    }
    public function getNombre():string{
        return $this->nombre;
    }
    public function getContrasenia():string{
        return $this->contrasenia;
    }
    public function setId_usuario(int $id_usuario):int{
        return $this->id_usuario = $id_usuario;
    }
    public function setNombre(string $nombre):string{
        return $this->nombre = $nombre;
    }
    public function setContrasenia(string $contrasenia):string{
        return $this->contrasenia = $contrasenia;
    }
    
}