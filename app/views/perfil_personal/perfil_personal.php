<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="perfil_personal.css">
</head>
<body>
    <?php include('../header/header.php'); ?>
    <div class="profile-container">
        <div class="user-info-left">
            <img class="user-image" src="./perfil_images/usuarioSinImagen.png" alt="Imagen de Usuario" id="userImage">
        </div>
        <div class="user-info-right">
            <h1 class="user-name">Tivik17</h1>
            <p class="user-fullname">Tatiana Valentinyova</p>
            <p class="user-description">Una pequeña descripción del usuario.</p>
            <a href="editar_perfil.php"><button class="edit-button">Editar Perfil</button> </a>
        </div>
        <div><p class="post-count">2 publicaciones</p></div>
    </div>
        

    <!-- Contenedor de las publicaciones -->
    <div class="post-container">
        <div class="post-card" onclick="openModal('ruta/imagen_publicacion_1.jpg', '50 likes', '10 comentarios')">
            <img class="post-image" src="ruta/imagen_publicacion_1.jpg" alt="Publicación 1">
            <div class="post-actions">
                <span class="post-like">❤️ 50</span>
                <span class="post-comment">💬 10</span>
            </div>
        </div>

        <div class="post-card" onclick="openModal('ruta/imagen_publicacion_2.jpg', '30 likes', '5 comentarios')">
            <img class="post-image" src="ruta/imagen_publicacion_2.jpg" alt="Publicación 2">
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
    

    <script>
        // Función para abrir el modal
        function openModal(imageSrc, likes, comments) {
            var modal = document.getElementById("myModal");
            var modalImage = document.getElementById("modalImage");
            var modalLikes = document.getElementById("modalLikes");
            var modalComments = document.getElementById("modalComments");
            var editPostButton = document.getElementById("editPostButton");

            modal.style.display = "block";
            modalImage.src = imageSrc;
            modalLikes.textContent = likes;
            modalComments.textContent = comments;

            // Agrega tu lógica de edición de publicación aquí.
            editPostButton.onclick = function() {
                // Agrega tu lógica de edición de publicación aquí.
            };
        }

        // Cierra el modal al hacer clic fuera de él
        window.onclick = function(event) {
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
