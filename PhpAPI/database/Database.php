<?php

class Database {
    private $host = "localhost";
    private $db_name = "users";
    private $username = "root";
    private $password = "qM%z%f3EAbiK@%ua";
    public $conn;

    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name}",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo $e;
        }

        return $this->conn;
    }
}
