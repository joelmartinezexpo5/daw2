<?php

namespace Producto\Interfaces;

use Producto\Clases\Producto;

interface IProducto{
    public function crear(Producto $producto):bool;
    public function listar():array;
    public function listarPorId(int $id):?Producto;
    public function borrar(int $id):bool;
}

?>