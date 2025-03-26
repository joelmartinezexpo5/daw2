<?php
namespace App\Interfaces;

interface InterfazProveedorCorreo {
    public function enviarCorreo(String $paraQuien, String $asunto, String $cuerpoMensaje):bool;
}