<?php
require_once 'Mensaje.php';

abstract class ElementoVolador implements Volador {
    use Mensaje; // Uso del trait Mensaje

    // ...resto del código de ElementoVolador
}

class Avion extends ElementoVolador {
    use Mensaje; // Uso del trait Mensaje

    // ...resto del código de Avion
}

class Helicoptero extends ElementoVolador {
    use Mensaje; // Uso del trait Mensaje

    // ...resto del código de Helicoptero
}
?>
