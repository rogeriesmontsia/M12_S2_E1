<?php

    include("../models/Database.php");
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $email = htmlspecialchars($_POST['email']);
        $pass = htmlspecialchars($_POST['pass']);

        //Conectar con la bbdd
        $database = new Database2();
        $db = $database->connect();

        //Consulta SQL para verificar las credenciales del usuario
        $query = $db->prepare("SELECT * FROM users WHERE email: email");
        $query -> execute(array(':email'=>$email));
        //se utiliza el método fetch para obtener la fila correspondiente a la base de datos
        //como un arreglo asociativo
        $user = $query ->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($pass, $user['pass'])){
            //las credenciales son correctas, iniciar sesion y redirigir al usuario
            session_start();
            $_SESSION["user_id"] = $user["id"];
            header("Location: ../views/sign_in.php");
            exit;
        }else{
            //las credenciales no son correctas
            echo "Ingrese un usuario y contraseña correctos";
        }
    }
    
    include("../views/sign_in.php");

?>