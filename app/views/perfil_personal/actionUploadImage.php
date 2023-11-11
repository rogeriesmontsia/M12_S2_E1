<?php
require_once '../../models/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userObj = new User();

    // Ruta donde se guardarán las imágenes
    $uploadDir = 'perfil_images/';
    $uploadFile = $uploadDir . basename($_FILES['newImage']['name']);
    
    if (move_uploaded_file($_FILES['newImage']['tmp_name'], $uploadFile)) {
        // Actualizar la ruta de la imagen en la base de datos
        $userObj->changeImage($_SESSION['user']['id_user'], $uploadFile);
        header('Location: perfil_personal.php');
    } else {
        echo "Error al subir la imagen.";
    }
}
