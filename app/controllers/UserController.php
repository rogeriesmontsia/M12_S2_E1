<?php
require_once '../models/User.php';
require_once '../models/Database.php';

$database = new Database();
$conn = $database->connect();

if (!$conn) {
    echo "Error al conectar a la base de datos.";
} else {
    $userController = new UserController();
    $userController->create();
}

class UserController
{
    private $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                $email = $_POST['email'];
                $pass = md5($_POST['pass']);
                $nom = $_POST['nom'];

                $this->model->create2($email, $pass, $nom);

                header("Location: ../views/userRegistered.php");
            } catch (Exception $e) {
                echo "Error en el controlador: " . $e->getMessage();
            }
        }
    }
}
