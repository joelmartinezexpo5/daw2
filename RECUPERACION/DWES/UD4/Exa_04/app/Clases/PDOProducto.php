<?php

namespace Producto\Clases;

use PDO;
use PDOException;
use Producto\Interfaces\IProducto;

class PDOProducto implements IProducto
{

    public function crear(Producto $producto): bool
    {
        $resultado = false;
        try {
            $conexion = ConexionBD::getConexion();
            $conexion->beginTransaction();
            $id_imagen = Funciones::crearImagen($producto->getImagen());

            if ($id_imagen !== 0) {
                $query = "INSERT INTO productos(id,nombre,descripcion,precio,familia,imagenId) 
            VALUES(:id,:nombre,:descripcion,:precio,:familia,:imagen_id)";

                $stmt = $conexion->prepare($query);
                $params = [
                    ':id' => $producto->getId(),
                    ':nombre' => $producto->getNombre(),
                    ':descripcion' => $producto->getDescripcion(),
                    ':precio' => $producto->getPrecio(),
                    'familia' => $producto->getFamilia()->getCodigo()
                ];

                $producto->getImagen()->setId($id_imagen);
                $params[':imagen_id'] = $producto->getImagen()->getId();

                if ($stmt->execute($params)) {
                    $conexion->commit();
                    $resultado = $stmt->rowCount() === 1;
                }
            }else{
                $conexion->rollBack();
            }
        } catch (PDOException $pdo_e) {
            echo 'PDOProducto->crear() ' . $pdo_e->getMessage();
            $conexion->rollback();
        }
        return $resultado;
    }

    public function listar(): array
    {
        $productos = [];
        try {
            $familias = Funciones::getFamilias();
            $conexion = ConexionBD::getConexion();

            $query = "SELECT 
            productos.id,productos.nombre,productos.descripcion,productos.precio,productos.familia,            
            imagenes.id as imagen_id,imagenes.nombre as imagen_nombre,imagenes.url
            FROM productos
            INNER JOIN imagenes ON productos.imagenId = imagenes.id
            ";

            $stmt = $conexion->query($query);

            while ($fila = $stmt->fetch(PDO::FETCH_OBJ)) {

                $familia = $familias[$fila->familia];
                $imagen = new Imagen($fila->imagen_nombre, $fila->url, $fila->imagen_id);

                $producto = new Producto($fila->nombre, $fila->descripcion, $fila->precio, $familia, $imagen, $fila->id);
                $productos[] = $producto;
            }
        } catch (PDOException $pdo_e) {
            echo 'PDOProducto->listar() ' . $pdo_e->getMessage();
        }

        return $productos;
    }

    public function listarPorId(int $id): ?Producto
    {
        $producto = null;
        try {
            $familias = Funciones::getFamilias();
            $conexion = ConexionBD::getConexion();

            $query = "SELECT 
            productos.id,productos.nombre,productos.descripcion,productos.precio,productos.familia,            
            imagenes.id as imagen_id,imagenes.nombre as imagen_nombre,imagenes.url
            FROM productos
            INNER JOIN imagenes ON productos.imagenId = imagenes.id 
            WHERE productos.id = '{$id}'";

            $stmt = $conexion->query($query);

            $fila = $stmt->fetch(PDO::FETCH_OBJ);
            $familia = $familias[$fila->familia];
            $imagen = new Imagen($fila->imagen_nombre, $fila->url, $fila->imagen_id);

            $producto = new Producto($fila->nombre, $fila->descripcion, $fila->precio, $familia, $imagen, $fila->id);
        } catch (PDOException $pdo_e) {
            echo 'PDOProducto->listarPorId() ' . $pdo_e->getMessage();
        }
        return $producto;
    }

    public function borrar(int $id): bool
    {
        $resultado = false;
        try {
            $conexion = ConexionBD::getConexion();
            $conexion->beginTransaction();
            $query = "SELECT imagenId from productos WHERE id = '{$id}'";

            $stmt = $conexion->query($query);
            $imagen_id = $stmt->fetch()['imagenId'];
            $query = "DELETE FROM productos WHERE productos.id = :id";

            $stmt = $conexion->prepare($query);
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                $resultado = Funciones::eliminarImagen($imagen_id);
                $resultado? $conexion->commit():$conexion->rollBack();
            }

        } catch (PDOException $pdo_e) {
            echo 'PDOProducto->borrar() ' . $pdo_e->getMessage();
            $conexion->rollBack();
        }
        return $resultado;
    }
}
