<?php

require_once '../models/CommunitiesUsers.php';
require_once '../models/Database.php';

$database = new Database();
$conn = $database->connect();

if (!$conn) {
    echo "Error al conectar a la base de datos.";
} else {
    $communitiesUsersController = new CommunitiesUsersController();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_GET['action'] == 'requestAccess') {
    if (isset($_POST['request'])) {
        $community_id = $_POST['request'];
        $communitiesUsersController->setUserToCommunity($community_id);
    }
}

class CommunitiesUsersController {
    private $model;

    public function __construct()
    {
        $this->model = new CommunitiesUsers();
    }

    public function setUserToCommunity($community_id)
    {
        try {
            $id_user = 1;
            $this->model->setUserToCommunity($community_id);
            header("Location: ../views/communityList.php");
        } catch (Exception $e) {
            echo "Error en el controlador: " . $e->getMessage();
        }
    }
}