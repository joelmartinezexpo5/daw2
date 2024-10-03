<?php
    abstract class Producto {
        protected $codigo;
        protected $nombre;
        protected $precio;
    
        public function __construct($codigo, $nombre, $precio) {
            $this->codigo = $codigo;
            $this->nombre = $nombre;
            $this->precio = $precio;
        }
    
        // Getters y Setters
        public function getCodigo() {
            return $this->codigo;
        }
    
        public function getNombre() {
            return $this->nombre;
        }
    
        public function getPrecio() {
            return $this->precio;
        }
    
        // Método abstracto que deberá implementarse en las clases hijas
        abstract public function mostrar();
    } 
?>