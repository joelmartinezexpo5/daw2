<?php

/**
 * Comprueba que el campo tenga contenido.
 *
 * @param string $param El parametro a validar.
 * @return bool True si el parametro esta relleno, false en cualquier otro caso.
 */
function validateRequired(string $param): bool
{
    return !empty($param);
}

/**
 * Comprueba que el campo sea de tipo numerico.
 *
 * @param string $param El parametro a validar.
 * @return bool True si es numerico, false en cualquier otro caso.
 */
function validateNumeric(string $param): bool
{
    return is_numeric($param);
}

/**
 * Valida si un archivo fue cargado por HTTP POST.
 *
 * @param array $file El archivo cargado con informacion en $_FILES.
 * @return bool True si se descargo via HTTP POST, false en culaquier otro caso.
 */
function validateUpload(array $file): bool
{
    return is_uploaded_file($file['tmp_name']);
}

/**
 * Valida si el formato de la imagen es 'jpeg' o 'png'.
 *
 * @param string $format El formato de imagen a validar.
 * @return bool True Si el formato es 'jpeg' o 'png', false en cualquier otro caso.
 */
function validateFormat(string $format): bool
{
    return $format === 'jpeg' || $format === 'png';
}

/**
 * Genera un nombre unico con un nombre dado.
 *
 * @param string $Name El nombre del archivo (e.g., 'airpods-pro.jpeg').
 * @return string El nombre de archivo generado (e.g., '6544c7349fef5-airpods-pro.jpg').
 */
function generateUniqueFileName(string $name): string
{
    // Genera un identificador unico usando un hash random de 13 caracteres
    $uniqueId = substr(uniqid(), -13);

    return "{$uniqueId}-{$name}";
}

/**
 * Limpia el input test aceptando solo etiquetas de HTML especificas
 *
 * @param string $param El texto a limpiar.
 * @return string El texto limpio con solo el contenido deseado y las etiquetas permitidas.
 */
function cleanText(string $param): string
{
    // Lista de las etiquetas HTML permitidas
    $allowed_tags = '<a><strong><em><h1><h2><h3><h4><h5><h6><ul><ol><li><blockquote><br><div><span><table><thead><tbody><tr><th><td>';

    // Elimina todas las etiquemas, menos las permitidas
    $stripped_param = strip_tags($param, $allowed_tags);

    return $stripped_param;
}

/**
 * Sanitiza un array limpiando cada uno de sus valores.
 *
 * @param array $formData El array asociativo de datos.
 * @return array El array sanitizado.
 */
function sanitizeEntrance(array $formData): array
{
    foreach ($formData as $name => $param) {
        $formData[$name] = cleanText($param);
    }
    return $formData;
}

/**
 * Redirige al usuario a la ruta especificada y sale del script.
 *
 * @param string $path La ruta a la que redireccionamos.
 * @return void
 */
function redirect(string $path): void
{
    header("Location: {$path}");
    exit;
}
