<?php

namespace Product\DB;

use PDOException;

class SQL
{
    public static function queryDB(string $query, array $params = []): bool
    {
        $response = false;
        try {

            $con = ConnectionDB::getConnection();

            $stmt = $con->prepare($query);

            if (!empty($params)) {
                foreach ($params as $param => $value) {
                    $stmt->bindParam($param, $value);
                }
            }
            $stmt->execute();
            $response = $stmt->rowCount() > 0;
        } catch (PDOException $pdo_e) {
            throw new PDOException("SQL::queryDB() " . $pdo_e->getMessage());
        }

        return $response;
    }
}
