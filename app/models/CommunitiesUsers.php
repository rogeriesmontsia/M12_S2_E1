<?php
session_start();
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
            $id_user = $_SESSION['user_id'];
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

    public function isUserMember($communityId, $id_user) {
        $query = 'SELECT * FROM ' . $this->table_name . ' WHERE id_community = :communityId AND id_user = :id_user';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':communityId', $communityId);
        $stmt->bindParam(':userId', $id_user);
        $stmt->execute();

        // Si hay al menos una fila, significa que el usuario pertenece a la comunidad
        return $stmt->rowCount() > 0;
    }

}
