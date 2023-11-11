<?php
require_once '../../models/User.php';

$userObj = new User();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $userObj->view_user_info();

    if (!$user) {
        // Si el usuari no esta loguejat, que el torne a la pàgina de iniciar sessió
        header('Location: ../sign_in.php');
        exit;
    }

    // Verificar si s'ha enviat el formulari i s'han realitzat els canvis
    if (isset($_POST['save_changes'])) {
        // Obtener los datos del formulario
        $newFirstName = $_POST['newFirstName'];
        $newLastName = $_POST['newLastName'];
        $newUsername = $_POST['newNickname'];
        $newEmail = $_POST['newEmail'];
        $newTelephone = $_POST['newPhone'];

        // Llamar a la función para editar el perfil
        $result = $userObj->edit_profile($newFirstName, $newLastName, $newUsername, $newEmail, $newTelephone);

        if ($result === true) {
            // Redirigir a la página de perfil con un mensaje de éxito
            header('Location: perfil_personal.php?success=1');
            exit;
        } else {
            // Redirigir a la página de perfil con un mensaje de error específico
            $errorInfo = $result instanceof Exception ? $result->getMessage() : 'No se realizó ningún cambio.';
            header('Location: perfil_personal.php?error=' . $errorInfo);
            exit;
        }
    }
} else {
    // Redirigir a la página de perfil si se accede a este archivo de manera incorrecta
    header('Location: perfil_personal.php');
    exit;
}
?>