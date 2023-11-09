<?php
//session_start();
include './header/header.php';
require_once '../controllers/CommunityController.php';
$userRole = $_SESSION['role'];
?>

<body>
    <div class="container">
        <h1 class="mt-5">Listado de comunidades</h1>

        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Comunidad Autónoma</th>
                    <?php
                    $userRole = $_SESSION['role'];
                    //$userRole = 'user';
                    // Aquí debes verificar el rol del usuario y mostrar el botón en consecuencia
                    //$userRole = obtenerRolUsuario(); // Debes reemplazar esto con tu lógica real para obtener el rol del usuario
                    if ($userRole == 'superAdmin') {
                        echo '<th>Acciones</th><th>Activa</th>';
                    }else if ($userRole == 'user') {
                        echo '<th>Solicitar acceso</th>';
                    }
                    ?>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($communities as $community) : ?>
                    <tr>
                        <td><?= $community['name'] ?></td>
                        <td><?= $community['description'] ?></td>
                        <td><?= $community['region'] ?></td>
                        <td>
                            <?php
                            $userRole = $_SESSION['role'];
                            // $userRole = 'superAdmin';
                            // Aquí debes verificar el rol del usuario y mostrar el botón en consecuencia
                            //$userRole = obtenerRolUsuario(); // Debes reemplazar esto con tu lógica real para obtener el rol del usuario

                            if ($userRole == 'superAdmin') {
                                echo '<form action="../controllers/CommunityController.php?action=updateCommunity" method="POST">';
                                echo '<button type="submit" class="btn btn-primary" name="setActive" value="' . $community['id_community'] . '">Habilitar comunidad</button>';
                                echo '<button type="submit" class="btn btn-danger" name="setInactive" value="' . $community['id_community'] . '">Deshabilitar comunidad</button>';
                                echo '</form>';
                                echo '<td>' . $community['isActive'] . '</td>';
                            } else if ($userRole == 'user') {
                                echo '<form action="../controllers/CommunitiesUsersController.php?action=requestAccess" method="POST">';
                                echo '<button type="submit" class="btn btn-success" name="request" value="' . $community['id_community'] . '">Solicitar</button>';
                            }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

    </div>
</body>
<?php include './footer/footer.php';
