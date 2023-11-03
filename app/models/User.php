<?php

require_once 'Database.php';

class User
{
    private $conn;
    private $table_name = "users";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function create2($email, $pass, $nom)
    {
        try {
            $query = "INSERT INTO " . $this->table_name . "(
                        email, 
                        password, 
                        username
                        ) 
                      VALUES (
                        :email, 
                        :pass, 
                        :username
                        )";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':pass', $pass);
            $stmt->bindParam(':username', $nom);

            $stmt->execute();
        } catch (Exception $e) {
            echo ("Error en el controlador: " . $e->getMessage());
        }
    }
}