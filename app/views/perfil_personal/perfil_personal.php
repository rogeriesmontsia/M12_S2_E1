<?php
require_once '../../models/User.php';

$userObj = new User();
$user = $userObj->view_user_info();

// if (!$user) {
//     // Si el usuario no está logueado, redirige al formulario de login
//     header('Location: ../sign_in.php');
//     exit;
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="perfilpersonal.css">
    <style>
        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            box-sizing: border-box;
        }

        .modal-content {
            max-width: 400px; /* Ajusta el ancho máximo según tus necesidades */
            margin: auto;
        }

        .modal-image {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <?php include('../header/header.php'); ?>
    <div class="container">
        <div class="profile-container">
            <div class="user-info-left">
            <img class="user-image" src="<?php echo ($user['profile_image'] ? 'perfil_images/' . $user['profile_image'] : 'perfil_images/usuarioSinImagen.png'); ?>" alt="Imagen de Usuario" id="userImage">
            </div>
            <div class="user-info-right">
                <h1 class="user-name"><?php echo $user['username']; ?></h1>
                <p class="user-fullname"><?php echo $user['firstname'] . ' ' . $user['lastname']; ?></p>
                <p class="user-description"><?php echo $user['city']; ?></p>
                <p class="post-count">2 publicaciones</p>
                <a href="editar_perfil.php"><button class="edit-button">Editar Perfil</button> </a>
            </div>
        </div>

        <!-- Contenedor de las publicaciones -->
        <div class="post-container">
            <div class="post-card" onclick="openModal('perfil_images/imatge1.jpg', '50 likes', '10 comentarios')">
                <img class="post-image" src="perfil_images/imatge1.jpg" alt="Publicación 1">
                <div class="post-actions">
                    <span class="post-like">❤️ 50</span>
                    <span class="post-comment">💬 10</span>
                </div>
            </div>

            <div class="post-card" onclick="openModal('perfil_images/imatge2.jpg', '30 likes', '5 comentarios')">
                <img class="post-image" src="perfil_images/imatge2.jpg" alt="Publicación 2">
                <div class="post-actions">
                    <span class="post-like">❤️ 30</span>
                    <span class="post-comment">💬 5</span>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal" id="myModal">
            <div class="modal-content">
                <img class="modal-image" id="modalImage" src="" alt="Publicación">
                <div class="modal-info">
                    <p id="modalLikes"></p>
                    <p id="modalComments"></p>
                </div>
                <div class="modal-actions">
                    <button class="edit-post-button" id="editPostButton">Editar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal(imageSrc, likes, comments) {
            var modal = document.getElementById("myModal");
            var modalImage = document.getElementById("modalImage");
            var modalLikes = document.getElementById("modalLikes");
            var modalComments = document.getElementById("modalComments");
            var editPostButton = document.getElementById("editPostButton");

            modalImage.src = imageSrc;
            modalLikes.textContent = likes;
            modalComments.textContent = comments;

            editPostButton.onclick = function () {
                // Lógica de edición de publicación
            };
        }

        window.onclick = function (event) {
            var modal = document.getElementById("myModal");
            if (event.target === modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <footer>
        <?php include('../footer/footer.php'); ?>
    </footer>
</body>

</html>
