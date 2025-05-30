<?php

require_once 'database/Database.php';

class Repo {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function findAll() {
        try {
            $query = "SELECT * FROM user";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            return $th;
        }
        
    }

    public function save($user, $id = null) {
        $firstName = $user['firstName'];
        $lastName = $user['lastName'];
        $password = $user['password'];
        if($id){
            try {
                $query = "UPDATE user SET first_name = '$firstName', last_name = '$lastName', password = '$password' WHERE id = $id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            } catch (\Throwable $th) {
                return $th;
            }
        } else {
            try {
            $query = "INSERT INTO user (first_name, last_name, password)	
            values ('$firstName', '$lastName', '$password');";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        } catch (\Throwable $th) {
            return $th;
        }
        }
        
    }

    public function delete($id) {
        try {
            $query = "DELETE FROM user WHERE id=$id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function findById($id){
        try {
            $query = "SELECT * FROM user WHERE id=$id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
