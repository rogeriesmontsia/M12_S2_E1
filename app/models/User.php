<?php

require_once 'Database.php';

class User {
    private $conn;
    private $table_name = "users";
    private $id;
    private $email;
    private $role;
    private $userName;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function createUser($email, $pass, $nom)
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

// function login 

    public function login($email, $password)
    {
        try {
            $query = "SELECT id_user, email, role, username FROM " . $this->table_name . " 
                      WHERE email = :email AND password = :password";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);

            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                $this->id = $user['id_user'];
                $this->email = $user['email'];
                $this->role = $user['role'];
                $this->userName = $user['username'];
                return true; // Usuario autenticado, se devuelve su información
            } else {
                return false; // Las credenciales no coinciden, el inicio de sesión falló
            }
        } catch (PDOException $e) {
            echo "Error en el controlador: " . $e->getMessage();
            return false; // Error al realizar el inicio de sesión
        }
    }

    public function getId()
    {
        return $this->id; // Asumiendo que tienes una propiedad "id" en tu clase
    }

    public function getEmail()
    {
        return $this->email; // Asumiendo que tienes una propiedad "email" en tu clase
    }

    public function getRole()
    {
        return $this->role; // Asumiendo que tienes una propiedad "email" en tu clase
    }

    public function getUsername() {
        return $this->userName;
    }

}