<?php
require_once '../../models/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Creem instància de la classe usuari
    $user = new User();

    // cridem a la funció changePassword
    $result = $user->changePassword($currentPassword, $newPassword, $confirmPassword);

    // Manejar el resultado según sea necesario
    if ($result === true) {
        echo 'Contraseña cambiada con éxito.';
    } else {
        echo 'Error: ' . $result;
    }
} else {
    echo 'Acceso no permitido.';
}
