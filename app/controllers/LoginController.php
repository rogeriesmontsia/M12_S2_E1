<?php
    include("../models/User.php"); 

class LoginController {
    private $user;

    public function __construct() {
        $this->user = new User();
    }

    public function processLogin($email, $password_md5) {
        if ($this->user->login($email, $password_md5)) {
            $this->startSession();
            $this->redirectUser();
        } else {
            $this->displayErrorMessage("Ingrese un usuario y contraseña correctos");
        }
    }

    //almacena información del usuario
    private function startSession() {
        session_start();
        $_SESSION['user_id'] = $this->user->getId();
        $_SESSION['email'] = $this->user->getEmail();
        $_SESSION['role'] = $this->user->getRole();
        $_SESSION['username'] = $this->user->getUsername();
    }

    private function redirectUser() {
        header("Location: ../views/landingpage/landingpage.php");
        exit;
    }

    private function displayErrorMessage($message) {
        echo $message;
    }
}


if(isset($_POST['email'])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['pass']);
    $password_md5 = md5($password);

    //creo objeto de Login controller que crea un objeto basado en la clase usuario
    $loginController = new LoginController();
    $loginController->processLogin($email, $password_md5);
} else {
    echo "Error en la conexión de la base de datos";
}
}
?>