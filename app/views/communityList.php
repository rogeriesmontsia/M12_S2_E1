<?php
include './header/header.php';
require_once '../controllers/CommunityController.php';
require_once '../controllers/CommunitiesUsersController.php';
$userRole = $_SESSION['role'];
?>

<?php


// Accede al valor de 'id_user' en $_SESSION
echo $_SESSION['id_user'];

?>

<body>
    <div class="container">
        <h1 class="mt-5">Listado de comunidades</h1>
        <?php
        if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
            echo '<div class="text-right"><a href="./form_create_community.php" class="btn btn-success" role="button">Solicitud para crear una comunidad</a></div>';
        }
        ?>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Comunidad Autónoma</th>
                    <?php
                    if ($userRole == 'superAdmin') {
                        echo '<th>Acciones</th><th>Activa</th>';
                    } else if ($userRole == 'user') {
                        echo '<th>Unirme a la comunidad</th>';
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($communities as $community) : ?>
                    <tr>
                        <td><a href="communityPage.php?id=<?= $community['id_community'] ?>"><?= $community['name'] ?></a></td>
                        <td><?= $community['description'] ?></td>
                        <td><?= $community['region'] ?></td>
                        <td>
                        <?php
                        if ($userRole == 'superAdmin') {
                            echo '<form action="../controllers/CommunityController.php?action=updateCommunity" method="POST">';
                            echo '<button type="submit" class="btn btn-primary" name="setActive" value="' . $community['id_community'] . '">Habilitar comunidad</button>';
                            echo '<button type="submit" class="btn btn-danger" name="setInactive" value="' . $community['id_community'] . '">Deshabilitar comunidad</button>';
                            echo '</form>';
                            echo '<td>' . $community['isActive'] . '</td>';
                        } else if ($userRole == 'user') {
                            $isMember = $communitiesUsersController->isMember($community['id_community'], $_SESSION['id_user']);

                            if ($isMember) {
                                echo '<form action="../controllers/CommunitiesUsersController.php?action=requestExit" method="POST">';
                                echo '<input type="hidden" name="id_user" value="' . $_SESSION['id_user'] . '">';
                                echo '<button class="btn btn-danger" name="exitCommunity" value="'. $community['id_community'] . '">Abandonar</button>';
                                echo '</form>';
                            } else {
                            echo '<form action="../controllers/CommunitiesUsersController.php?action=requestAccess" method="POST">';
                            echo '<input type="hidden" name="id_user" value="' . $_SESSION['id_user'] . '">';
                            echo '<button type="submit" class="btn btn-success" name="requestAccess" value="' . $community['id_community'] . '">Unirme</button>';
                            echo '</form>';


                                }
                        }
                    endforeach; ?>
                        </td>
                    </tr>

            </tbody>
        </table>
    </div>
</body>
<?php include './footer/footer.php';
