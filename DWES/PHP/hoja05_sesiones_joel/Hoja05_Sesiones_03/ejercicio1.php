<?php
// Iniciar sesión
session_start();

// Comprobar si es la primera vez que el usuario visita
if (!isset($_SESSION['contador_visitas'])) {
    $_SESSION['contador_visitas'] = 1; 
    echo "¡Bienvenido a tu primera visita!";
} else {
    // Si ya existe, incrementamos el contador
    $_SESSION['contador_visitas']++;
    echo "Número de visitas anteriores: " . $_SESSION['contador_visitas'] - 1;
}

// Mostrar un mensaje indicando el número total de visitas
echo "<br>Has visitado esta página " . $_SESSION['contador_visitas'] . " veces.";
?>