<?php
namespace App\Classes;

use App\Interfaces\ProductoRepositorioInterface;

class PDOCrearProducto implements ProductoRepositorioInterface
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = ConexionBD::getConnection();
    }

    public function crear($producto)
    {
        $query = "INSERT INTO productos (nombre, precio, descripcion, imagen) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        return $stmt->execute([
            $producto->getNombre(),
            $producto->getPrecio(),
            $producto->getDescripcion(),
            $producto->getImagen()
        ]);
    }
}
?>
