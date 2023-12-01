<?php
session_start();
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

    public function createCommunity($nom_comunitat, $descripcio, $idComunidadAutonoma)
    {
        try {
            $id_admin = $_SESSION['id_user'];
            $query = "INSERT INTO " . $this->table_name . "(
                        id_admin,
                        name, 
                        description, 
                        id_comunitat_autonoma
                        ) 
                      VALUES (
                        :id_admin,
                        :name, 
                        :description, 
                        :id_comunitat_autonoma
                        )";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':id_admin', $id_admin);
            $stmt->bindParam(':name', $nom_comunitat);
            $stmt->bindParam(':description', $descripcio);
            $stmt->bindParam(':id_comunitat_autonoma', $idComunidadAutonoma);

            $stmt->execute();
        } catch (Exception $e) {
            echo ("Error en el controlador: " . $e->getMessage());
        }
    }

    public function getAll()
    {

        // Obtiene el rol del usuario de la sesión
        $userRole = isset($_SESSION['role']) ? $_SESSION['role'] : '';

        // Variable para almacenar la consulta
        $query = '';

        if ($userRole == 'superAdmin') {
            $query = "SELECT * FROM $this->table_name";
        } else if ($userRole == 'user') {
            $query = 'SELECT * FROM ' . $this->table_name . ' WHERE isActive = 1';
        }

        // Verifica que $query no esté vacío antes de ejecutar la consulta
        if (!empty($query)) {
            $this->conn->exec("set names utf8");
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            // Manejar el caso donde $query está vacío, por ejemplo, lanzar una excepción o retornar un valor predeterminado
            return [];
        }
    }

    public function getCommunityById($community_id)
    {
        $query = 'SELECT * FROM ' . $this->table_name . ' WHERE id_community = :community_id';
        $stmt = $this->conn->prepare($query);
        $this->conn->exec("set names utf8");
        $stmt->bindParam(':community_id', $community_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
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

    public function getName($community_id)
    {
        $query = 'SELECT name FROM ' . $this->table_name . ' WHERE id_community = :community_id';
        $stmt = $this->conn->prepare($query);
        $this->conn->exec("set names utf8");
        $stmt->bindParam(':community_id', $community_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getCA()
    {
        try {
            $query = "SELECT id_comunitat_autonoma, name FROM comunitats_autonomes";
            $stmt = $this->conn->prepare($query);
            $this->conn->exec("set names utf8");
            $stmt->execute();

            // Obtener resultados como array asociativo
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Manejo de excepciones de PDO (ajusta según tus necesidades)
            die("Error de PDO: " . $e->getMessage());
        }
    }

    public function getComarcasByCA($idComunitatAutonoma)
    {
        try {
            $query = "SELECT id_comarca, name FROM comarques WHERE id_comunitat_autonoma = :idComunitatAutonoma";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':idComunitatAutonoma', $idComunitatAutonoma, PDO::PARAM_INT);
            $stmt->execute();

            // Obtener resultados como array asociativo
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Manejo de excepciones de PDO (ajusta según tus necesidades)
            die("Error de PDO: " . $e->getMessage());
        }
    }
}
