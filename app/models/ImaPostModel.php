<?php
require_once "Database.php";


class ImagePostModel {
    
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function obtenerNomImagens($postId) {
        $sql = "SELECT nom FROM imagePost WHERE id_post = :id";
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