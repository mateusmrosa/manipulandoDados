<?php

namespace App\Models;

use PDO;
use PDOException;

class Database
{
    private $host = 'localhost';
    private $db_name = 'db_test_ipag_manipulando_dados';
    private $username = 'admin';
    private $password = 'root';
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name}",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro na conexão com o banco de dados: " . $e->getMessage();
            exit;
        }
    }

    public function insertData($table, $data)
    {
        ini_set('max_execution_time', 300);

        try {
            $columns = "`" . implode("`, `", array_keys($data)) . "`";
            $values = implode(", ", array_fill(0, count($data), "?"));
            $stmt = $this->conn->prepare("INSERT INTO $table ($columns) VALUES ($values)");
            $stmt->execute(array_values($data));
            return true;
        } catch (PDOException $e) {
            echo "Erro ao inserir os dados no banco de dados: " . $e->getMessage();
            return false;
        }
    }
}
