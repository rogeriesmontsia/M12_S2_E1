<?php
require_once '../models/Community.php';
require_once '../models/Database.php';

$database = new Database();
$conn = $database->connect();

if (!$conn) {
    echo "Error al conectar a la base de datos.";
} else {
    $communityController = new CommunityController();
    $communities = $communityController->index(); // Obtener las comunidades
    $enumValues = $communityController->getEnum();
    // $community = $communityController->getCommunityById($community_id);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_GET['action'] == 'registerCommunity') {
    $communityController->create();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_GET['action'] == 'updateCommunity') {
    if (isset($_POST['setActive'])) {
        $community_id = $_POST['setActive'];
        $communityController->activateCommunity($community_id);
    } elseif (isset($_POST['setInactive'])) {
        $community_id = $_POST['setInactive'];
        $communityController->deactivateCommunity($community_id);
    }
}


class CommunityController
{
    private $model;

    public function __construct()
    {
        $this->model = new Community();
    }
    public function create()
    {
        try {
            $nom_comunitat = htmlspecialchars($_POST['nom_comunitat']);
            $descripcio = htmlspecialchars($_POST['descripcio']);
            $comunidad_enum = htmlspecialchars($_POST['comunidad_enum']);

            $this->model->createCommunity($nom_comunitat, $descripcio, $comunidad_enum);

            header("Location: ../views/communityCreated.php");
        } catch (Exception $e) {
            echo "Error en el controlador: " . $e->getMessage();
        }
    }

    public function index()
    {
        return $this->model->getAll();
    }

    public function getCommunityById($community_id)
    {
        // Aquí deberías usar el modelo para obtener la información de la comunidad
        $communityModel = new Community(); // Asegúrate de ajustar esto según tu implementación
        $community = $communityModel->getCommunityById($community_id);

        return $community;
    }

    public function activateCommunity($community_id)
    {
        try {
            $this->model->setCommunityActive($community_id);

            header("Location: ../views/communityList.php");
        } catch (Exception $e) {
            echo "Error en el controlador: " . $e->getMessage();
        }
    }

    public function deactivateCommunity($community_id)
    {

        try {
            $this->model->setCommunityInactive($community_id);

            header("Location: ../views/communityList.php");
        } catch (Exception $e) {
            echo "Error en el controlador: " . $e->getMessage();
        }
    }

    public function getNomComunitat($community_id)
    {
        try {
            $name = $this->model->getName($community_id);
            return $name["name"];
        } catch (Exception $e) {
            echo "Error en el controlador: " . $e->getMessage();
        }
    }

    public function getEnum()
    {
        try {
            $values = $this->model->getEnumValues();
            return $values;
        } catch (Exception $e) {
            echo "Error en el controlador: " . $e->getMessage();
        }
    }
}
