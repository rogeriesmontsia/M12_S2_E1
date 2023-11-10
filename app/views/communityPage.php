<?php
// communityPage.php
include './header/header.php';
// Importar el controlador necesario
require_once '../controllers/CommunityController.php';

// Crear una instancia del controlador
$communityController = new CommunityController();

// Obtener el ID de la comunidad desde la URL
$communityId = isset($_GET['id']) ? $_GET['id'] : null;

// $communityId = 1;

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
    // Manejar el caso en el que no se encuentra la comunidad
    echo "Comunidad no encontrada.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $community['name'] ?></title>
</head>
<body>
    <!-- Contenido de la página -->
    <h1><?= $community['name'] ?></h1>
    <p><?= $community['description'] ?></p>
    <p>Comunidad Autónoma: <?= $community['region'] ?></p>

    <!-- Aquí puedes agregar más detalles de la comunidad -->

    <?php
    // Mostrar acciones según el rol del usuario
    if ($userRole == 'superAdmin') {
        echo '<form action="../controllers/CommunityController.php?action=updateCommunity" method="POST">';
        echo '<button type="submit" class="btn btn-primary" name="setActive" value="' . $community['id_community'] . '">Habilitar comunidad</button>';
        echo '<button type="submit" class="btn btn-danger" name="setInactive" value="' . $community['id_community'] . '">Deshabilitar comunidad</button>';
        echo '</form>';
        echo '<p>Activa: ' . $community['isActive'] . '</p>';
    } else if ($userRole == 'user') {
        echo '<form action="../controllers/CommunitiesUsersController.php?action=requestAccess" method="POST">';
        echo '<button type="submit" class="btn btn-success" name="request" value="' . $community['id_community'] . '">Unirme</button>';
    }
    ?>

</body>
</html>
