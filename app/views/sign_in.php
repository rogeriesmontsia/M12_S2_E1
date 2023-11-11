<?php include("./header/header.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Sign In</title>
</head>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php include("../controllers/LoginController.php"); ?>

    <div class="container d-flex justify-content-center align-items-center">
        <div>
            <h1 class="text-center">Login</h1>
            <div class="text-right mb-3">
                <a href="./sign_up.php" class="btn btn-success" role="button">Registrarme</a>
            </div>
            
            <form action="../controllers/LoginController.php" method="post" id="loginForm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" placeholder="Escribe tu correo electrónico" name="email" id="email" required>
                            <!-- alert -->
                        </div>
                        <div class="mb-3">
                            <label for="pass">Contraseña</label>
                            <input type="password" class="form-control" placeholder="Escribe tu contraseña" name="pass" id="pass" required>
                            <!-- alert -->
                        </div>

                        <div class="text-right mb-3">
                            <a href="#">
                                <p>He olvidado la contraseña</p>
                            </a>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<?php include("./footer/footer.php"); ?>

<script src="../public/assets/sign_in.js"></script>


</html>