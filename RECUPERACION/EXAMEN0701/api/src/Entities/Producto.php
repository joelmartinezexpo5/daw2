<?php

declare(strict_types = 1);

namespace Examen0701\Entities;

use Examen0701\Services\DBConnection;
use PDO;
use PDOException;

final class Producto
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DBConnection::getInstance()->getConexion();
        $this-> createTable();
    }

    private function createTable(): void
    {
        $sql = 'CREATE TABLE IF NOT EXISTS productos (
            id INT AUTO_INCREMENT PRIMARY KEY,
            titulo VARCHAR(50) NOT NULL,
            descripcion VARCHAR(255) NOT NULL,
            precio DECIMAL(10, 2) NOT NULL,
            imagen VARCHAR(255) DEFAULT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )';

        $this->db->exec(statement: $sql);
    }

    /**
     * @param array<string, mixed> $data
     * @return false|string
     */
    public function create(array $data): false|string
    {
        // Si no viene imagen, la dejamos en NULL
        $imagen = $data['imagen'] ?? null;

        $sql = "INSERT INTO productos (titulo, descripcion, precio, imagen) VALUES (:titulo, :descripcion, :precio, :imagen)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'titulo' => $data['titulo'],
            'descripcion' => $data['descripcion'],
            'precio' => $data['precio'],
            'imagen' => $imagen,
        ]);

        return $this->db->lastInsertId();
    }

    public function find(int $id): array|null
    {
        try {
            $stmt = $this->db->prepare('SELECT id, titulo, descripcion, precio, imagen, created_at FROM productos WHERE id = :id');
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $resultado;
        } catch (PDOException $error) {
            return null;
        }
    }

    public function get(): array|null
    {
        try {
            $stmt = $this->db->query('SELECT id, titulo, descripcion, precio, imagen, created_at FROM productos');
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $resultado;
        } catch (PDOException $error) {
            return null;
        }
    }

    public function update(array $data): bool
    {
        try {
            $stmt = $this->db->prepare('UPDATE productos SET titulo = :titulo, descripcion = :descripcion, precio = :precio, imagen = :imagen WHERE id = :id');
            $stmt->bindParam(":id", $data['id']);
            $stmt->bindParam(":titulo", $data['titulo']);
            $stmt->bindParam(":descripcion", $data['descripcion']);
            $stmt->bindParam(":precio", $data['precio']);
            $stmt->bindParam(":imagen", $data['imagen']);
            return $stmt->execute();
        } catch (PDOException $error) {
            return false;
        }
    }

     public function delete(int $id):bool{
        try{
        $stmt=$this->db->prepare('DELETE  FROM productos WHERE id=:id');
        $stmt->bindParam(":id",$id);
        return  $stmt->execute();
        }catch(PDOException $error){
            return false;
        }
    }
}