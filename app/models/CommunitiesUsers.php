<?php
// session_start();
require_once 'Database.php';

class CommunitiesUsers
{
    private $conn;
    private $table_name = "communitiesUsers";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function setUserToCommunity($community_id) {
        try {
            $id_user = 3;
            //$id_admin = $_SESSION['id_user'];
            $query = "INSERT INTO " . $this->table_name . "(
                        id_community,
                        id_user
                        ) 
                      VALUES (
                        :id_community,
                        :id_user
                        )";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':id_community', $community_id);
            $stmt->bindParam(':id_user', $id_user);

            $stmt->execute();
        } catch (Exception $e) {
            echo ("Error en el controlador: " . $e->getMessage());
        }
    }

}
