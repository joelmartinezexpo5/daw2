<?php

declare(strict_types=1);

namespace App\Rules;
use App\Services\DBConnection;
use PDO;
use PDOException;
final class UniqueRule extends AbstractRule
{

    private string $table;
    private string $column;
    private ?int $id;

    public function __construct(string $table, string $column, ?int $id = null, string $message = '')
    {
        parent::__construct($message);
        $this->table = $table;
        $this->column = $column;
        $this->id = $id;
    }


    public function validate(mixed $value): bool
    {
          try {
            $db = DBConnection::getConexion();

            if ($this->id === null) {
               
                $sql = "SELECT COUNT(*) FROM `" . $this->table . "` WHERE `" . $this->column . "` = :valor";
                $stmt = $db->prepare($sql);
                $stmt->bindValue(':valor', $value);
            } else {
               
                $sql = "SELECT COUNT(*) FROM `" . $this->table . "` WHERE `" . $this->column . "` = :valor AND id != :id";
                $stmt = $db->prepare($sql);
                $stmt->bindValue(':valor', $value);
                $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
            }
            $stmt->execute();
            $cuenta = (int) $stmt->fetchColumn();
            return $cuenta == 0;
        } catch (PDOException $error) {
            return false;
        }
    }

}