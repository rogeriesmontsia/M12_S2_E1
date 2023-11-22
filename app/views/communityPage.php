<?php
include './header/header.php';
require_once '../controllers/CommunityController.php';
require_once '../controllers/CommunitiesUsersController.php';

// Crear una instancia del controlador
$communityController = new CommunityController();

// Obtener el ID de la comunidad desde la URL
$communityId = isset($_GET['id']) ? $_GET['id'] : null;

// Verificar si se proporcionó un ID válido
if (!$communityId) {
    // Manejar el caso en el que no se proporciona un ID válido
    echo "ID de comunidad no válido.";
    exit;
}

// Obtener la información de la comunidad por ID
$community = $communityController->getCommunityById($communityId);

// Verificar si se encontró la comunidad
if (!$community) {
    echo "Comunidad no encontrada.";
    exit;
} elseif (!empty($_SESSION['username'])) {

?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $community['name'] ?></title>
    </head>

    <body>
        <div class="container my-5">
            <h1><?= $community['name'] ?></h1>
            <p><?= $community['description'] ?></p>
            <p>Comunidad Autónoma: <?= $community['region'] ?></p>
            <a href="./communityAllAdvertisement.php?id=<?= $communityId ?>">
                <button type="submit" class="btn btn-primary" name="showAdvertisements" value="' . $community['id_community'] . '">Ir a anuncios</button>
            </a>
            <a href="./communityAllPost.php?id=<?= $communityId ?>">
                <button type="submit" class="btn btn-primary" name="showPosts" value="' . $community['id_community'] . '">Ir a posts</button>
            </a>
            <?php
            $isMember = $communitiesUsersController->isMember($community['id_community'], $_SESSION['id_user']);

            if ($isMember) {
                echo '<a href="./form_post.php?id='.$community["id_community"].'">';
                echo '<button type="submit" class="btn btn-success" name="showPosts" value="' . $community['id_community'] . '">Publicar un anuncio/post</button></a>';
            } else {
            } ?>
        </div>
    </body>

    </html>
<?php
} else {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <div class="container mt-3 w-50">
            <div class="alert alert-danger" role="alert">
                Para acceder <a href="./sign_up.php" class="alert-link">regístrate</a> o <a href="./sign_in.php" class="alert-link">inicia sesión</a>
            </div>
        </div>
    <?php
}
include('./footer/footer.php');

    ?>