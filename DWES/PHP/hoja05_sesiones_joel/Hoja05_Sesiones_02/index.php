<?php
// Nombre de la cookie
$nombreCookie = "ultima_visita";

// Verifica si la cookie ya está configurada
if (isset($_COOKIE[$nombreCookie])) {
    // Obtiene el valor de la cookie
    $ultima_visita = $_COOKIE[$nombreCookie];
    echo "Bienvenido de nuevo! Tu última visita fue el: " . date("d/m/Y H:i:s", strtotime($ultima_visita));
} else {
    echo "¡Bienvenido! Esta es tu primera visita.";
}

// Actualiza la cookie con la fecha y hora actual
$fecha_actual = date("Y-m-d H:i:s");
setcookie($nombreCookie, $fecha_actual, time() + 86400 );
?>
