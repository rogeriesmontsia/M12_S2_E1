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

    public function obtenirPostImagens() {
        $sql = "SELECT posts.id_post, posts.title, posts.description, imagePost.nom
                FROM posts 
                INNER JOIN imagePost ON imagePost.id_post = posts.id_post and imagePost.nom LIKE '%ima1.%'";  
        $stmt = $this->conn->prepare($sql);
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