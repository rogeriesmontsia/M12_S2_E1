<?php
session_start();
include('./header/header.php');
require_once '../controllers/CommunityController.php';

// Accede al valor de 'id_user' en $_SESSION
// echo $_SESSION['id_user'];
?>

<head>
    <title>Formulario para crear una comunidad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../public/assets/js/form_create_community.js"></script>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center">
        <div>
            <h1 class="text-center">Formulario para crear una comunidad</h1>
            <form id="formulario" action="../controllers/CommunityController.php?action=registerCommunity" method="post">
                <div class="alert alert-danger" id="generalAlert" role="alert"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="nom_comunitat" class="form-label">Nombre de la comunidad</label>
                            <input type="text" class="form-control" id="nom_comunitat" name="nom_comunitat">
                            <div class="mt-3 alert alert-danger" id="alertNomComunitat" role="alert"></div>
                        </div>
                        <div class="mb-3">
                            <label for="descripcio" class="form-label">Descripción de la comunidad</label>
                            <input type="text" class="form-control" id="descripcio" name="descripcio">
                            <div class="mt-3 alert alert-danger" id="alertDescripcio" role="alert"></div>
                        </div>
                        <div class="mb-3">
                            <label for="comunidad_enum" class="form-label">Comunidad Autónoma</label>
                            <select class="form-select" id="comunidad_enum" name="comunidad_enum">
                                <?php foreach ($enumValues as $community) : ?>
                                    <option value="<?= $community['id_comunitat_autonoma'] ?>"><?= $community['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="mt-3 alert alert-danger" id="alertComunitat" role="alert"></div>
                        </div>
                        <div class="mb-3">
                            <label for="comarca" class="form-label">Comarca</label>
                            <select class="form-select" id="comarca" name="comarca">
                                <?php foreach ($enumValues as $value) : ?>
                                    <option value="<?= $value ?>"><?= $value ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="mt-3 alert alert-danger" id="alertComunitat" role="alert"></div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="checkCondicions">
                            <label class="form-check-label" for="checkCondicions">He leído y acepto los términos y condiciones</label>
                            <div class="mt-3 alert alert-danger" id="alertCondicions" role="alert"></div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button id="boto-registrar" type="button" class="mb-3 btn btn-primary" onclick="formulari()">Registrar la comunidad</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

<?php include('./footer/footer.php'); ?>