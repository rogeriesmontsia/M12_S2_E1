<?php
include './header/header.php';
require_once '../controllers/CommunityController.php';

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
    <div class="container">
        <!-- Contenido de la página -->
        <h1><?= $community['name'] ?></h1>
        <p><?= $community['description'] ?></p>
        <p>Comunidad Autónoma: <?= $community['region'] ?></p>
    </div>
</body>

</html>
<?php include('./footer/footer.php');
