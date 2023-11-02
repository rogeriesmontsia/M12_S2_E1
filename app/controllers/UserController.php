<?php
ob_start();
require_once '../models/User.php';
// Archivo de configuración de la base de datos
require_once '../models/Database.php';

// Intenta establecer una conexión a la base de datos
$database = new Database();
$conn = $database->connect();

// Verificar si la conexión se estableció correctamente
if ($conn) {
    echo "Conexión a la base de datos exitosa.";
} else {
    echo "Error al conectar a la base de datos.";
}
// $datosUsuario = array();
// $datosUsuario['email'] = $_POST['email'];
// $datosUsuario['pass'] = $_POST['pass'];
// $datosUsuario['nom'] = $_POST['nom'];
// $datosUsuario['cognoms'] = $_POST['cognoms'];
// $datosUsuario['adreça'] = $_POST['adreça'];
// $datosUsuario['ciutat'] = $_POST['ciutat'];
// $datosUsuario['codipostal'] = $_POST['codipostal'];
// $datosUsuario['telefon'] = $_POST['telefon'];

class UserController
{
    private $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function create()
    {
        try {
            ob_start();
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Recopila los datos del formulario POST
                $email = $_POST['email'];
                $pass = md5($_POST['pass']);
                $nom = $_POST['nom'];

                // Llama a la función create del modelo User para procesar los datos
                $this->model->create2($email, $pass, $nom);

                // Redirige al usuario a "index.php" u otra ubicación después del registro
                header("Location: ../views/userRegistered.php");
                ob_end_flush();
            }
        } catch (Exception $e) {
            // Manejo de la excepción, como registro de errores o redirección a una página de error.
            echo("Error en el controlador: " . $e->getMessage());

            // Puedes redirigir al usuario a una página de error personalizada aquí.
            // header("Location: error.php");
        }
    }
    
}
 require_once '../views/sign_up.php';