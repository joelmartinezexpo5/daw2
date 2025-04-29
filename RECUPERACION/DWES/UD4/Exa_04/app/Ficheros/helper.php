<?php

function validarRequerido(string $input): bool {
    return !empty($input);
}

function validarNumerico (string $input): bool{
   return is_numeric($input);
}

function validarLongitud(string $input, int $lon):bool{
    return strlen($input)==$lon;
}

// ver la documentacion 
//https://www.php.net/manual/es/features.file-upload.post-method.php

function validarSubidaFichero(array $fichero ):bool{  
    return $fichero['name']!=0 && $fichero['error'] == UPLOAD_ERR_OK;
}

function validarFormatoImagen( string $tipo): bool{
    return  $tipo=='image/jpeg';

}

function limpiarTexto(string $input): string {
    $clean_input = strip_tags(
        string: $input,
        allowed_tags: '<strong><em>'
    );
    return htmlspecialchars($clean_input, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

function limpiarEntrada(): void {
    foreach ($_POST as $key => $value) {
        $_POST[$key] = match(true) {
            is_numeric($value) => filter_input(INPUT_POST, $key, FILTER_SANITIZE_NUMBER_FLOAT),
            is_array($value) => filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY),
            default => limpiarTexto($value), // FILTER_SANITIZE_STRING is DEPRECATED on PHP 8.1
        };
    }
}

function redireccionar(string $path): void {
    header("Location: $path");
    exit;
}
