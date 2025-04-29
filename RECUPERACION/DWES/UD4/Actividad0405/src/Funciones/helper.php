<?php

//aqui sin mas, las funciones auxiliares que van a utilizar las otras clases y archivos
function validar_requerido(string $campo): bool {
    return !empty($campo);
}


function validar_numerico(string $campo): bool {
    return is_numeric($campo);
}

function validar_longitud(string $campo, int $longitud): bool {
    return strlen($campo) === $longitud;
}


function validar_subida_fichero(array $archivo): bool {
    return isset($archivo['tmp_name']) && is_uploaded_file($archivo['tmp_name']);
}


function validar_formato_imagen(string $tipo): bool {
    return strtolower($tipo) === 'jpg';
}


function limpiar_texto(string $texto): string {
    return strip_tags($texto, '<strong><em>');
}


function limpiar_entrada(string $entrada): string {
      return htmlspecialchars(trim($entrada), ENT_QUOTES, 'UTF-8');
}


function redireccionar(string $url): void {
    header('Location: ' . $url);
    exit();
}
?>