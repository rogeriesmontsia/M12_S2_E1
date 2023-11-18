<?php

require_once '../models/CommunitiesUsers.php';
require_once '../models/Database.php';
require_once '../models/User.php';

$database = new Database();
$conn = $database->connect();
if (!$conn) {
    echo "Error al conectar a la base de datos.";
} else {
    $communitiesUsersController = new CommunitiesUsersController();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_GET['action'] == 'requestAccess') {
    $id_user = $_POST['id_user'];

    $community_id = $_POST['requestAccess'];
    $communitiesUsersController->setUserToCommunity($community_id, $id_user);
}



// exitCommunity
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_GET['action'] == 'requestExit') {
    if (isset($_POST['exitCommunity'])) {
        $id_user = $_POST['id_user'];
        $community_id = $_POST['exitCommunity'];
        $communitiesUsersController->unsetUserFromCommunity($community_id, $id_user);
    }
}


class CommunitiesUsersController {
    private $model;

    public function __construct()
    {
        $this->model = new CommunitiesUsers();
    }

    public function setUserToCommunity($community_id, $id_user)
    {
        try {
            // Verifica que $id_user no sea nulo o esté vacío antes de realizar la operación
          
                $this->model->setUserToCommunity($community_id, $id_user);
                header("Location: ../views/communityList.php");
           
        } catch (Exception $e) {
            echo "Error en el controlador: " . $e->getMessage();
        }
    }

    public function unsetUserFromCommunity($community_id, $id_user)
    {
        try {
            $this->model->unsetUserFromCommunity($community_id, $id_user);
            header("Location: ../views/communityList.php");
        } catch (Exception $e) {
            echo "Error en el controlador: " . $e->getMessage();
        }
    }

    public function isMember($community_id, $id_user) {
        try {
            return $this->model->isUserMember($community_id, $id_user);
        } catch (Exception $e) {
            echo "Error en el controlador: " . $e->getMessage();
            return false;
        }
    }
}