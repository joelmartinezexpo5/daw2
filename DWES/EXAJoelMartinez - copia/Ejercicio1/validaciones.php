<?php

class validaciones{
    public function validaNombre($nombre): bool {
        if (mb_strlen($nombre) < 3) {
            return false;
        }
        return true;
    }

    public function validaEmail($email): bool{
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function validaTelefono($telefono): bool{
        if(strlen($telefono) === 9){
            return true;
        }
        return false;
    }
 }

?>