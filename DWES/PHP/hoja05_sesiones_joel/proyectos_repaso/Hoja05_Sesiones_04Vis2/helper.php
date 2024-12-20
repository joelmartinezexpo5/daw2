<?php



function flash(string $clave,string $mensaje= null):string|null{

    //Si existe la clave entra por el if y nos quedamos con su valor para posteriormente retornarlo.
    //Ademas, tendremos que eliminar la clave
    if(isset($_SESSION['flash'][$clave])){
        $valor = $_SESSION['flash'][$clave];
        unset($_SESSION['flash'][$clave]);
        return $valor;
    }

    //En caso de que la clave no tenga valor y el mensaje no sea nulo entra por este if
    //asignandole un mensaje a la clave y retornando el mensaje
    if($mensaje !== null){
        $_SESSION['flash'][$clave] = $mensaje;
        return $mensaje;
    }

    return null;
}

function iniciar_sesion(): void{

    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }

}

function estaLogueado(): bool {
    return isset($_SESSION['usuario']) && $_SESSION['usuario'] !== null;
}


function redireccionar(string $url) {

    header(header: "Location: $url");
    exit();
}

function esPost(): bool{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}