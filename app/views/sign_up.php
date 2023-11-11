<?php include('./header/header.php'); ?>

<head>
    <title>Formulario de registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- <script src="../public/assets/js/sign_up.js"></script> -->
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center">
        <div>
            <h1 class="text-center">Formulario de registro</h1>
            <form id="formulario" action="../controllers/UserController.php?action=signup" method="post">
                <div class="alert alert-danger" id="generalAlert" role="alert"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" name="email">
                            <div class="mt-3 alert alert-danger" id="alertmail" role="alert"></div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="pass">
                            <div class="mt-3 alert alert-danger" id="alertPass" role="alert"></div>
                        </div>
                        <div class="mb-3">
                            <label for="password2" class="form-label">Repite la contraseña</label>
                            <input type="password" class="form-control" id="password2">
                            <div class="mt-3 alert alert-danger" id="alertPass2" role="alert"></div>
                        </div>
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nombre de usuario</label>
                            <input type="text" class="form-control" id="nom" name="nom">
                            <div class="mt-3 alert alert-danger" id="alertNom" role="alert"></div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="checkCondicions">
                            <label class="form-check-label" for="checkCondicions">He leído y acepto los términos y condiciones</label>
                            <div class="mt-3 alert alert-danger" id="alertCondicions" role="alert"></div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button id="boto-registrar" type="submit" class="mb-3 btn btn-primary">Registrarme</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

<?php include('./footer/footer.php'); ?>