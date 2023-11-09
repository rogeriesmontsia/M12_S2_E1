<?php 
include './header/header.php';
require_once '../controllers/CommunityController.php';
?>

<body>
    <div class="container">
        <h1 class="mt-5">Llistat de comunitats</h1>

        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Comunidad Autónoma</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($communities as $community) : ?>
                    <tr>
                        <td><?= $community['id_community'] ?></td>
                        <td><?= $community['name'] ?></td>
                        <td><?= $community['description'] ?></td>
                        <td><?= $community['region'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
<?php include './footer/footer.php';