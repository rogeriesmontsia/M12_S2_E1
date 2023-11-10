<?php
 require_once ("Database.php");
 
class PostModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function obtenirTitle($postId) {
        $sql = "SELECT title FROM posts WHERE id_post = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $postId);
        $stmt->execute();

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($resultado) {
            return $resultado;
        } else {
            return null;
        }
    }

    public function obtenirDescripcio($postId) {
        $sql = "SELECT description FROM posts WHERE id_post = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $postId);
        $stmt->execute();

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($resultado) {
            return $resultado;
        } else {
            return null;
        }
    }  
    
    public function obtenirTots ($postId) {
        $sql = "SELECT * FROM posts WHERE id_post = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $postId);
        $stmt->execute();

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($resultado) {
            return $resultado;
        } else {
            return null;
        }
    }
}

?>