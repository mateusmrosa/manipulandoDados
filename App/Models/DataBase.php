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

    public function getRelatorio1()
    {
        try {
            $query = "SELECT name, number_of_employees
                      FROM  organizations
                      WHERE number_of_employees > 5000
                      ORDER BY name
                      LIMIT 500";
            $stmt = $this->conn->query($query);
            $result = $stmt->fetchAll();

            return $result;
        } catch (PDOException $e) {
            echo "Erro ao obter dados do banco de dados: " . $e->getMessage();
            return false;
        }
    }

    public function getRelatorio2()
    {
        try {
            $query = "SELECT *
                      FROM organizations
                      WHERE founded < 2000 AND number_of_employees < 1000
                      ORDER BY founded";
            $stmt = $this->conn->query($query);
            $result = $stmt->fetchAll();

            return $result;
        } catch (PDOException $e) {
            echo "Erro ao obter dados do banco de dados: " . $e->getMessage();
            return false;
        }
    }

    public function getRelatorio3()
    {
        try {
            $query = "SELECT industry, country,
                      COUNT(DISTINCT name)     AS quantidade_organizacoes,
                      SUM(number_of_employees) AS quantidade_funcionarios
                      FROM     organizations
                      GROUP BY industry, country
                      ORDER BY industry";
            $stmt = $this->conn->query($query);
            $result = $stmt->fetchAll();

            return $result;
        } catch (PDOException $e) {
            echo "Erro ao obter dados do banco de dados: " . $e->getMessage();
            return false;
        }
    }
}
