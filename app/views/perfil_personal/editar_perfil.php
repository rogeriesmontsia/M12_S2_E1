<?php
require_once '../../models/User.php';

$userObj = new User();
$user = $userObj->view_user_info();

if (!$user) {
    // Si entra a la página y el usuario no está logueado, que lo lleve a la página de iniciar sesión
    header('Location: ../sign_in.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <?php include('../header/header.php'); ?>
    <div class="profile-container">
        <div id="containerImage" class="user-info-left">
            <img class="user-image" src="<?php echo ($user['profile_image'] ? $user['profile_image'] : './perfil_images/usuarioSinImagen.png'); ?>" alt="Imagen de Usuario" id="userImage">
            <button class="change-image-button" id="changeImageButton">Cambiar Imagen</button>
        </div>
        <div class="user-info-right">
            <h1 class="user-name"><?php echo $user['username']; ?></h1>
            <form method="post" action="actionEditProfile.php">
                <label for="newFirstName">Nombre:</label>
                <input type="text" id="newFirstName" name="newFirstName" value="<?php echo $user['firstname']; ?>">
                <label for="newLastName">Apellido:</label>
                <input type="text" id="newLastName" name="newLastName" value="<?php echo $user['lastname']; ?>">
                <label for="newNickname">Nickname:</label>
                <input type="text" id="newNickname" name="newNickname" value="<?php echo $user['username']; ?>">
                <label for="newEmail">Correo Electrónico:</label>
                <input type="email" id="newEmail" name="newEmail" value="<?php echo $user['email']; ?>">
                <label for="newPhone">Teléfono:</label>
                <input type="tel" id="newPhone" name="newPhone" value="<?php echo $user['telephone']; ?>">
                <div class="button-group">
                    <button class="save-button" type="submit" name="save_changes">Guardar Cambios</button>
                    <div class="button-container">
                        <a href="perfil_personal.php"><button type="button" class="cancel-button">Cancelar</button></a>
                        <button type="button" id="changePasswordButton" class="change-password-button">Cambiar contraseña</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal para cambiar la imagen del usuario -->
    <div id="changeImageModal" class="modal">
        <div class="modal-content">
            <span class="close" style="float: right;">&times;</span>
            <h2>Cambiar imagen</h2>
            <form id="imageForm" action="actionUploadImage.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="newImage">Seleccionar nueva imagen:</label>
                    <input type="file" class="form-control-file" id="newImage" name="newImage" accept="image/*">
                </div>
                <button type="submit" class="btn btn-success">Guardar Cambios</button>
                <button type="button" class="btn btn-danger" onclick="deleteImage()">Eliminar Imagen</button>
            </form>

        </div>
    </div>

    <!-- Modal para cambiar la contraseña del usuario -->
    <div id="changePasswordModal" class="modal">
        <div class="modal-content">
            <span class="close" style="float: right;">&times;</span>
            <h2>Cambiar contraseña</h2>
            <form id="passwordForm">
                <div class="form-group">
                    <label for="currentPassword">Contraseña actual:</label>
                    <input type="password" class="form-control" id="currentPassword" name="currentPassword">
                </div>
                <div class="form-group">
                    <label for="newPassword">Nueva contraseña:</label>
                    <input type="password" class="form-control" id="newPassword" name="newPassword">
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirmar nueva contraseña:</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                </div>
                <button type="button" class="btn btn-success" onclick="changePassword()">Cambiar Contraseña</button>
            </form>
        </div>
    </div>



    <footer>
        <?php include('../footer/footer.php'); ?>
    </footer>
    <script src="perfil.js"></script>
    <style>
        /* Estilos generales */
        body {
            font-family: 'Arial', sans-serif;
        }


        /* Estilos para la tabla principal */
        .profile-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin: 20px;
        }


        /* Estilos para la sección de información del usuario a la izquierda */
        .user-info-left {
            flex: 1;
            text-align: center;
        }


        .user-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 10px;
        }


        .change-image-button {
            display: block;
            margin: 10px auto;
        }


        /* Estilos para la sección de información del usuario a la derecha */
        .user-info-right {
            flex: 2;
            margin-right: 200px;
        }


        /* Estilos para los campos editables */
        label {
            display: block;
            margin-top: 10px;
        }


        input {
            width: 100%;
            margin-bottom: 10px;
        }


        /* Estilos para los botones al final de la sección de información del usuario */
        .save-button,
        .cancel-button,
        .change-password-button {
            display: block;
            width: 100%;
            margin-top: 10px;
        }

        /* Media query para dispositivos móviles */
        @media (max-width: 768px) {
            .profile-container {
                flex-direction: column;
                align-items: center;
            }



        }

        /* The Modal (background) */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            /* Ajusta el margen superior para centrarlo más alto en la página */
            padding: 20px;
            border: 1px solid #888;
            width: 60%;
            /* Ajusta el ancho del modal según tus necesidades */
        }

        /* The Close Button */
        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</body>

</html>