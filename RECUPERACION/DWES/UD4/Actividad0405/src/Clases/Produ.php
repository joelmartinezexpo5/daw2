<?php
namespace Ejercicio0405\Clases;

use Ejercicio0405\Interfaces\IntRepoProducto;
//clase puente para el patron repositorio
class Produ
{
    private $repositorio;

    public function __construct(IntRepoProducto $repositorio)
    {
        $this->repositorio = $repositorio;
    }

    public function crearProducto(Producto $producto): bool
    {
        return $this->repositorio->crear($producto);
    }

    public function listarProductos(): array
    {
        return $this->repositorio->listar();
    }

    public function obtenerProductoPorId(int $id): ?Producto
    {
        return $this->repositorio->listarPorId($id);
    }

    public function borrarProducto(int $id): bool
    {
        var_dump($id); // Verifica el valor de $id
        return $this->repositorio->borrar($id);
    }
}