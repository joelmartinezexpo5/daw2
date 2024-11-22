<?php

function validarRequerido($campo)
{
    return !empty(trim($campo));
}

function validarNumerico($campo)
{
    return is_numeric($campo);
}

function validarSubidaFichero($archivo)
{
    return isset($archivo['tmp_name']) && is_uploaded_file($archivo['tmp_name']);
}

function validarFormatoImagen($archivo)
{
    $ext = pathinfo($archivo, PATHINFO_EXTENSION);
    return in_array(strtolower($ext), ['jpeg', 'png']);
}

function limpiarTexto($texto)
{
    return filter_var($texto, FILTER_SANITIZE_STRING);
}

function limpiarEntrada($entrada)
{
    $entrada = limpiarTexto($entrada);
    return htmlspecialchars($entrada, ENT_QUOTES, 'UTF-8');
}

function redireccionar($url)
{
    header("Location: $url");
    exit;
}
?>
