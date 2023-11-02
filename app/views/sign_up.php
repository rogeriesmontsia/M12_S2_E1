<?php
// require('./header/header.php'); 
require_once '../controllers/UserController.php'; 
$controller = new UserController(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->create(); 
}
?>

<head>
    <title>Formulari de registre</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="../public/assets/js/sign_up.js"></script>

</head>

    <h1>Formulari de registre</h1>
    <div class="container">
    <form id="formulario" action="../controllers/UserController.php" method="post">
            <div class="alert alert-danger" id="generalAlert" role="alert">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Correu electrònic</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="alert alert-danger" id="alertmail" role="alert"></div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contrasenya</label>
                        <input type="password" class="form-control" id="password" name="pass">
                    </div>
                    <div class="alert alert-danger" id="alertPass" role="alert"></div>
                    <div class="mb-3">
                        <label for="password2" class="form-label">Repeteix la contrasenya</label>
                        <input type="password" class="form-control" id="password2">
                    </div>
                    <div class="alert alert-danger" id="alertPass2" role="alert"></div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom d'usuari</label>
                        <input type="text" class="form-control" id="nom" name="nom">
                    </div>
                    <div class="alert alert-danger" id="alertNom" role="alert"></div>
                    <input type="checkbox" class="form-check-input" id="checkCondicions">
                        <label class="form-check-label" for="checkCondicions">He llegit i accepto els termes i
                            condicions</label>
                        <div class="alert alert-danger" id="alertCondicions" role="alert"></div>
                </div>
                
                    
                        
                    
                </div>
            </div>
            <button id="boto-registrar" type="submit" class="btn btn-primary" onclick="formulari()">Registrar-me</button>
        </form>
    </div>

    <?php require('./footer/footer.php'); ?>  