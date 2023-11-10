<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="editar_perfil.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        /* Estilos para centrar los modales */
        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.5);
            margin-top: 400px;
            z-index: 1;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <?php include('../header/header.php'); ?>
    <div class="profile-container">
        <div class="user-info-left">
            <img class="user-image" src="./images/usuariosinimagen.png" alt="Imagen de Usuario" id="userImage">
            <button class="change-image-button" onclick="openImageModal()">Cambiar Imagen</button>
        </div>
        <div class="user-info-right">
            <h1 class="user-name">Tivik17</h1>
            <form method="post" action="procesar_formulario.php"> <!-- Cambia 'procesar_formulario.php' por el archivo que procesa el formulario -->
                <label for="newFirstName">Nombre:</label>
                <input type="text" id="newFirstName" name="newFirstName" value="Tatiana" disabled>
                <label for="newLastName">Apellido:</label>
                <input type="text" id="newLastName" name="newLastName" value="Valentinyova" disabled>
                <label for="newNickname">Nickname:</label>
                <input type="text" id="newNickname" name="newNickname" value="Tivik17" disabled>
                <label for="newEmail">Correo Electrónico:</label>
                <input type="email" id="newEmail" name="newEmail" value="tivik17@example.com" disabled>
                <label for="newPhone">Teléfono:</label>
                <input type="tel" id="newPhone" name="newPhone" value="123-456-7890" disabled>
                <div class="button-group">
                    <button class="delete-button" onclick="deleteImage()">Eliminar Imagen</button>
                    <button class="save-button" type="submit">Guardar Cambios</button>
                    <button class="cancel-button" onclick="GoBack()">Cancelar</button>
                </div>
            </form>
        </div>
        <button type="button" id="passwordModalButton" class="raise" data-toggle="modal" data-target="#changePasswordModal"><span>Cambiar contraseña</span></button>
    </div>

    <!-- Modal para cambiar la imagen -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Cambiar Imagen de Perfil</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="file" accept="image/*" id="newImageInput">
                </div>
                <div class="modal-footer">
                    <button onclick="changeImage()">Cambiar Imagen</button>
                    <button onclick="closeImageModal()">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para cambiar la contraseña del usuario -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordModalLabel">Cambiar contraseña</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="changePasswordForm" action="updatePassword.php" onsubmit="validateForm(event)" method="POST">
                        <div class="form-group">
                            <label for="currentPassword">Contraseña actual:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="currentPassword" name="passActual">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="showCurrentPasswordButton">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="newPassword">Nueva contraseña:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="newPassword" name="pass1">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="showNewPasswordButton">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confirmNewPassword">Confirmar nueva contraseña:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="confirmNewPassword" name="pass2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="showConfirmNewPasswordButton">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div id="errorMessage" class="text-danger"></div>
                        <button type="submit" name="editar" class="pulse">Guardar contraseña</button>
                        <button type="button" class="close" data-dismiss="modal">Cerrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript para abrir y cerrar el modal de imagen de perfil -->
    <script>
        function openImageModal() {
            $('#imageModal').modal('show');
        }

        function closeImageModal() {
            $('#imageModal').modal('hide');
        }

        function changeImage() {
            // Agrega lógica para cambiar la imagen aquí
            closeImageModal();
        }

        function deleteImage() {
            // Agrega lógica para eliminar la imagen aquí
            // Puedes mostrar un mensaje de confirmación antes de realizar la acción
            closeImageModal();
        }

        function GoBack() {
            // Obtener la ubicación actual
            var currentLocation = window.location.href;

            // Obtener la ruta del directorio actual
            var currentDirectory = currentLocation.substring(0, currentLocation.lastIndexOf("/"));

            // Construir la URL completa del archivo perfil_personal.php
            var perfilPersonalURL = currentDirectory + "/perfil_personal.php";

            // Redireccionar a la nueva ubicación
            window.location.href = perfilPersonalURL;
        }
    </script>

    <footer>
        <?php include('../footer/footer.php'); ?>
    </footer>
</body>

</html>