<?php

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

    public function create2($nom_comunitat, $descripcio, $comunitat_autonoma)
    {
        try {
            $query = "INSERT INTO " . $this->table_name . "(
                        name, 
                        description, 
                        region
                        ) 
                      VALUES (
                        :name, 
                        :description, 
                        :region
                        )";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':name', $nom_comunitat);
            $stmt->bindParam(':description', $descripcio);
            $stmt->bindParam(':region', $comunitat_autonoma);

            $stmt->execute();
        } catch (Exception $e) {
            echo ("Error en el controlador: " . $e->getMessage());
        }
    }
}