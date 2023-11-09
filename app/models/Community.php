<?php
// session_start();
require_once 'Database.php';

class Community
{
    private $conn;
    private $table_name = "communities";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function createCommunity($nom_comunitat, $descripcio, $comunitat_autonoma)
    {
        try {
            $id_admin = 6;
            //$id_admin = $_SESSION['id_user'];
            $query = "INSERT INTO " . $this->table_name . "(
                        id_admin,
                        name, 
                        description, 
                        region
                        ) 
                      VALUES (
                        :id_admin,
                        :name, 
                        :description, 
                        :region
                        )";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':id_admin', $id_admin);
            $stmt->bindParam(':name', $nom_comunitat);
            $stmt->bindParam(':description', $descripcio);
            $stmt->bindParam(':region', $comunitat_autonoma);

            $stmt->execute();
        } catch (Exception $e) {
            echo ("Error en el controlador: " . $e->getMessage());
        }
    }

    public function getAll()
    {
        $userRole = 'user';
        if ($userRole == 'superAdmin') {
            $query = "SELECT * FROM $this->table_name";
        } else if ($userRole == 'user') {
            $query = 'SELECT * FROM ' . $this->table_name . ' WHERE isActive = 1';
        }
        $this->conn->exec("set names utf8");
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function setCommunityActive($community_id)
    {
        // $community_id = 5;
        $query = 'UPDATE ' . $this->table_name . ' SET isActive = 1 WHERE id_community = :community_id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':community_id', $community_id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function setCommunityInactive($community_id)
    {
        // $community_id = 5;
        $query = 'UPDATE ' . $this->table_name . ' SET isActive = 0 WHERE id_community = :community_id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':community_id', $community_id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
