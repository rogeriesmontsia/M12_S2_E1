<?php

require_once '../../models/User.php';

$userObj = new User();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del usuario
    $user = $userObj->view_user_info();

    if (!$user) {
        // El usuario no está logueado
        header('Location: ../sign_in.php');
        exit;
    }

    // Llamar a la función para eliminar la imagen
    $result = $userObj->deleteImage();

    if ($result) {
        // Redirigir a la página de perfil con un mensaje de éxito
        header('Location: perfil_personal.php?success=1');
        exit;
    } else {
        // Mostrar el mensaje de error directamente en la página
        echo "Error al eliminar la imagen.";
        exit;
    }
} else {
    // Redirigir a la página de perfil si se accede a este archivo de manera incorrecta
    header('Location: perfil_personal.php');
    exit;
}
?>