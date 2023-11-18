<?php
    include("../models/User.php"); 
if (isset($_POST['email'])){
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['pass']);
        $password_md5 = md5($password);
        $user = new User();

        if($user->login($email, $password_md5)){
            //las credenciales son correctas, iniciar sesion y redirigir al usuario
            session_start(); 

            //almacena informacion del usuario en la sesion
            $_SESSION['id_user'] = $user->getId();
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['role'] = $user->getRole();
            $_SESSION['username'] = $user->getUsername();

            //redirige al usuario
            header('Location: ../index.php');

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