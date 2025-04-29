<?php

namespace Producto\Clases;

use Producto\Interfaces\IProducto;

class ProductoService{

    private IProducto $interfaz;
    
    public function __construct(IProducto $interfaz){
        $this->interfaz = $interfaz;
    }

    public function crear(Producto $producto):bool{
        return $this->interfaz->crear($producto);
    }
    public function listar():array{
        return $this->interfaz->listar();
    }
    public function listarPorId(int $id):Producto{
        return $this->interfaz->listarPorId($id);
    }
    public function borrar(int $id):bool{
        return $this->interfaz->borrar($id);
    }

}

?>