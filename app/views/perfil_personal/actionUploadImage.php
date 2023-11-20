<?php
session_start();
require_once '../../models/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userObj = new User();

    // Ruta donde se guardarán las imágenes
    $uploadDir = 'perfil_images/';
    $newImageName = basename($_FILES['newImage']['name']);
    $uploadFile = $uploadDir . $newImageName;

    // Verificar si se subió el archivo correctamente
    if (move_uploaded_file($_FILES['newImage']['tmp_name'], $uploadFile)) {
        // Actualizar la ruta de la imagen en la base de datos
        $updateImageResult = $userObj->changeImage($_SESSION['id_user'], $newImageName);

        if ($updateImageResult) {
            // Redireccionar a la página de perfil después de la actualización exitosa
            header('Location: perfil_personal.php');
        } else {
            echo "Error al actualizar la base de datos con la nueva imagen.";
        }
    } else {
        echo "Error al subir la imagen: " . $_FILES['newImage']['error'];
    }
}
