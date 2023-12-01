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

    public function createCommunity($nom_comunitat, $descripcio, $comunidad_enum)
    {
        try {
            $id_admin = $_SESSION['id_user'];
            $query = "INSERT INTO " . $this->table_name . "(
                        id_admin,
                        name, 
                        description, 
                        ENUM
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
            $stmt->bindParam(':region', $comunidad_enum);

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
    public function getEnumValues()
    {
        try {
            // Nombre de la tabla que almacena los valores del enum
            $tablaEnum = $this->table_name;

            // Nombre de la columna que almacena los valores del enum
            $columnaEnum = 'ENUM';

            // Consulta para obtener los valores del enum
            $query = "SHOW COLUMNS FROM $tablaEnum LIKE '$columnaEnum'";
            $stmt = $this->conn->prepare($query);
            $this->conn->exec("set names utf8");
            $stmt->execute();

            // Verifica si la consulta fue exitosa
            if ($stmt) {
                $fila = $stmt->fetch(PDO::FETCH_ASSOC);

                // Obtiene los valores del enum de la definición de columna
                $enumDefinition = $fila['Type'];
                preg_match('/enum\((.*?)\)/', $enumDefinition, $matches);
                $enumValues = explode(',', $matches[1]);

                // Elimina comillas simples de los valores
                $enumValues = array_map(function ($value) {
                    return trim($value, "'");
                }, $enumValues);

                return $enumValues;
                echo ("hola" . $enumValues);
            } else {
                // Manejo de errores (ajusta según tus necesidades)
                die("Error al obtener valores del enum: " . $this->conn->errorInfo()[2]);
            }
        } catch (PDOException $e) {
            // Manejo de excepciones de PDO (ajusta según tus necesidades)
            die("Error de PDO: " . $e->getMessage());
        }
    }
}
