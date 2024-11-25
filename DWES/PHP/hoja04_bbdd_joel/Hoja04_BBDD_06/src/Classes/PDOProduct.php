<?php

namespace Product\Classes;

use PDOException;
use Product\DB\ConnectionDB;
use Product\DB\SQL;
use Product\Interfaces\IProduct;
use Product\Models\ProductModel;

class PDOProduct implements IProduct
{
    private function createTableProduct(string $query): bool
    {
        $response = false;
        try {
            $response = SQL::queryDB($query);
        } catch (PDOException $pdo_e) {
            throw new PDOException('-PDOProduct->createTableProduct() ' . $pdo_e->getMessage());
        }
        return $response;
    }

    public function __construct()
    {
        $query = "CREATE TABLE IF NOT EXISTS products  (
                    id int(11) NOT NULL AUTO_INCREMENT COMMENT 'Products auto_increment id',
                    name varchar(100) NOT NULL  COMMENT 'Name of the product',
                    price double NOT NULL COMMENT 'Price of the products',
                    description text NOT NULL COMMENT 'Description of the products',
                    image varchar(255) DEFAULT NULL COMMENT 'URL of the image',
                    PRIMARY KEY(id)
                );";
        $this->createTableProduct($query);
    }


    /////////////////FUNCIONES PARA GESTIONAR LOS PRODUCTOS/////////////////
    public function create(ProductModel $product): bool
    {
        $result = false;
        try {
            $con = ConnectionDB::getConnection();

            $query = 'INSERT INTO products(name,price,description,image)
            VALUES(:name,:price,:description,:image)';

            $stmt = $con->prepare($query);

            $stmt->bindParam(':name', $product->getName());
            $stmt->bindParam(':price', $product->getPrice());
            $stmt->bindParam(':description', $product->getDescription());
            $stmt->bindParam(':image', $product->getImage());

            if ($stmt->execute()) {
                $result = $stmt->rowCount() === 1;
            }
        } catch (\PDOException $pdo_e) {
            throw new \PDOException('PDOProduct->create() ' . $pdo_e->getMessage());
        }
        return $result;
    }
}
