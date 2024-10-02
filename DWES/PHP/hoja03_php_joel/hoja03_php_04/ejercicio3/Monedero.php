<?php
    class Monedero {
        // Atributo privado que almacena el dinero del monedero
        private $dinero;

        // Atributo estático que cuenta el número de monederos creados
        public static $numero_monederos = 0;

        // Constructor que inicializa el monedero con una cantidad de dinero inicial
        public function __construct($cantidad_inicial) {
            $this->dinero = $cantidad_inicial;
            self::$numero_monederos++;  // Incrementa el contador de monederos al crear un nuevo objeto
        }

        // Destructor para decrementar el número de monederos cuando se destruye un objeto
        public function __destruct() {
            self::$numero_monederos--;  // Decrementa el contador de monederos
        }

        // Método para meter dinero en el monedero
        public function meterDinero($cantidad) {
            if ($cantidad > 0) {
                $this->dinero += $cantidad;
            } else {
                echo "La cantidad a ingresar debe ser positiva.<br>";
            }
        }

        // Método para sacar dinero del monedero
        public function sacarDinero($cantidad) {
            if ($cantidad > 0 && $cantidad <= $this->dinero) {
                $this->dinero -= $cantidad;
            } elseif ($cantidad > $this->dinero) {
                echo "No puedes sacar más dinero del que tienes.<br>";
            } else {
                echo "La cantidad a retirar debe ser positiva.<br>";
            }
        }

        // Método para consultar el dinero disponible en el monedero
        public function consultarDisponible() {
            return $this->dinero;
        }

        // Método estático para consultar el número total de monederos creados
        public static function getNumeroMonederos() {
            return self::$numero_monederos;
        }
    }
?>
