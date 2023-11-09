<?php
    include("../models/User.php"); 
if (isset($_POST['email'])){
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['pass']);
        $user = new User();

        if($user->login($email, $password)){
            //las credenciales son correctas, iniciar sesion y redirigir al usuario
            session_start(); 

            //almacena informacion del usuario en la sesion
            $_SESSION['user_id'] = $user->getId();
            $_SESSION['email'] = $user->getEmail();

            //redirige al usuario
            require_once('../views/landingpage/landingpage.php');

            exit;
        }else{
            //las credenciales no son correctas
            echo "Ingrese un usuario y contraseña correctos";
        }
    }else{
            echo "Error en la conexión a la base de datos" ;
    }
}
    
    

?>