<?php
// Iniciar sesión
session_start();

// Comprobar si es la primera vez que el usuario visita
if (!isset($_SESSION['visitas'])) {
    // Si no existe la variable visitas, es su primera visita
    $_SESSION['visitas'] = []; // Inicializamos el array para almacenar los instantes de las visitas
    echo "¡Bienvenido a tu primera visita!";
} else {
    // Mostrar las visitas anteriores
    echo "Últimas visitas:<br>";
    foreach ($_SESSION['visitas'] as $visita) {
        echo $visita . "<br>";
    }
}

// Almacenar el instante de la visita actual
$ultimaVisita = date('d-m-Y H:i:s'); // Formato de fecha y hora actual
$_SESSION['visitas'][] = $ultimaVisita; // Añadir el instante a la lista de visitas

// Mostrar el instante de la visita actual
echo "Tu última visita fue: " . $ultimaVisita;
?>

