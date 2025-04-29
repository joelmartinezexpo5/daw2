<?php
// filepath: c:\Users\rompe\OneDrive\Documentos\DWES\periodoRecuperacion\Actividad0405\src\ClasesBD\PDOProducto.php
namespace Ejercicio0405\ClasesBD;

use Ejercicio0405\Interfaces\IntRepoProducto;
use Ejercicio0405\Clases\Producto;
use PDO;
use PDOException;
//esta clase separada de las demas funciones de base de datos es exclusiva para la clase producto por que usa el patron repositorio
class PDOProducto implements IntRepoProducto
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = ConexionBD::getConnection();
    }

    //crear producto
    function crear(Producto $producto): bool
    {
        try {
            $stmt = ConexionBD::getConnection();
            $consulta = $stmt->prepare('INSERT INTO productos(nombre,descripcion,precio,familia) VALUES (:nombre,:descripcion,:precio,:familia)');
            $nombre = $producto->__get("nombre");
            $descripcion = $producto->__get("descripcion");
            $precio = $producto->__get("precio");
            $familia = $producto->__get("familia");

            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':descripcion', $descripcion);
            $consulta->bindParam(':precio', $precio);
            $consulta->bindParam(':familia', $familia);
            var_dump($nombre, $descripcion, $precio, $familia);
            return $consulta->execute();
        } catch (PDOException $e) {
            echo "Error al guardar el producto: " . $e->getMessage();
            return false;
        }
    }

    //listar productos
    function listar(): array
    {
        try {
            $stmt = ConexionBD::getConnection();
            $consulta = $stmt->query('SELECT p.idproductos, p.nombre, p.descripcion, p.precio, p.familia, i.nombre AS imagen 
                 FROM productos AS p
                 INNER JOIN imagenes AS i ON p.idproductos = i.producto');
            $productos = $consulta->fetchAll(PDO::FETCH_OBJ);
            return $productos;
        } catch (PDOException $e) {
            echo "Error al listar los productos: " . $e->getMessage();
            return [];
        }
    }

    //listar producto por id,sacar un producto
    function listarPorId($id): ?Producto
    {
        try {
            $stmt = ConexionBD::getConnection();
            $consulta = $stmt->prepare(
                'SELECT p.idproductos, p.nombre, p.descripcion, p.precio, p.familia, i.nombre AS imagen 
                 FROM productos AS p
                 INNER JOIN imagenes AS i ON p.idproductos = i.producto
                 WHERE p.idproductos = :id'
            );
            $consulta->bindParam(':id', $id);
            $consulta->execute();

            $resultado = $consulta->fetch(PDO::FETCH_OBJ);

            $producto = new Producto(
                $resultado->nombre,
                $resultado->descripcion,
                $resultado->precio,
                $resultado->familia,
                $resultado->imagen,
                $resultado->idproductos
            );



            return $producto;
        } catch (PDOException $e) {
            echo "Error al obtener el producto por ID: " . $e->getMessage();
            return null;
        }
    }

    //borrar un producto
    function borrar($id): bool
    {
        try {
            var_dump($id); // Verifica el valor de $id
            $stmt = ConexionBD::getConnection();
            var_dump($stmt); // Verifica la conexión
            $consulta = $stmt->prepare('DELETE FROM productos WHERE idproductos = :id');
            $consulta->bindParam(':id', $id);
            return $consulta->execute();
        } catch (PDOException $e) {
            echo "Error al borrar el producto: " . $e->getMessage();
            return false;
        }
    }
}