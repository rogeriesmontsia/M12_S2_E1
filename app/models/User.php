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
                        :firstname
                        )";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':pass', $pass);
            $stmt->bindParam(':firstname', $nom);

            $stmt->execute();
        } catch (Exception $e) {
            // Manejo de la excepción, como registro de errores o redirección a una página de error.
            echo ("Error en el controlador: " . $e->getMessage());
        }
    }
}