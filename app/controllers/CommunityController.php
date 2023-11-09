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
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_GET['action'] == 'registerCommunity') {
    $communityController->create();
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
            $nom_comunitat = $_POST['nom_comunitat'];
            $descripcio = $_POST['descripcio'];
            $comunitat_autonoma = $_POST['comunitat_autonoma'];

            $this->model->create2($nom_comunitat, $descripcio, $comunitat_autonoma);

            header("Location: ../views/communityCreated.php");
        } catch (Exception $e) {
            echo "Error en el controlador: " . $e->getMessage();
        }
    }

    public function index()
    {
        return $this->model->getAll();
    }
}