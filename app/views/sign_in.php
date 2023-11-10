<!-- Pàgina per al login -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../public/assets/sign_in.js"></script>
    <title>Login</title>
</head>
<body>

    <?php include("./header/header.php"); ?>
    <?php include("../controllers/LoginController.php"); ?>

    <div class="container justify-content-center align-items-center">
        <div>
            <h1 class="text-center">Login</h1>
            <form action="../controllers/LoginController.php" method="post" id="loginForm">
                <div class="alert alert-danger" id="generalAlert" role="alert"></div>
                    <div class="row">  
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="Write your email"  name="email" id="email" required>
                                <div class="mt-3 alert alert-danger" id="alertmail" role="alert"></div>
                            </div>
                            <div class="mb-4">
                                <label for="pass" class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="Write your password"  name="pass" id="pass" required >
                                <div class="mt-3 alert alert-danger" id="alertPass" role="alert"></div>
                            </div>
                            <div class="mb-4"></div>
                            <div class="text-right">
                                <a href="#"><p>He olvidado la contraseña</p></a>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="mb-3 boto text-center" onclick="formulari()">Enviar</button>
                        </div>
                        <div>
                            <p></p>
                        </div>
                    </div>    
                </div> 
            </form>
            <div class="col"></div>
        </div>  
    </div>
    <?php include("./footer/footer.php"); ?>

</body>
</html>