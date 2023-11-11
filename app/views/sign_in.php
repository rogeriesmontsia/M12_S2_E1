<!-- Pàgina per al login -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sig In</title>
</head>
<body>

    <?php include("./header/header.php"); ?>
    <?php include("../controllers/LoginController.php"); ?>

    <div class="container-sm">
        <div class="row justify-content-center">
            <h1 class="text-center">Login</h1>
        </div>
        <div class="row">  
            <div class="col"></div>    
            <div class="col-sm">
                    <form action="../controllers/LoginController.php" method="post" id="loginForm">

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" placeholder="Write your email"  name="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" class="form-control" placeholder="Write your password"  name="pass" id="pass" required >
                        </div>

                        <div class="text-right">
                            <a href="#"><p>He olvidado la contraseña</p></a>
                        </div>
                        <div class>
                            <button type="submit" class="boto text-center">Enviar</button>
                        </div>

                        <div>
                            <p></p>
                        </div>
                    </form>
            </div>  
            <div class="col"></div>
        </div>  
    </div>
    <?php include("./footer/footer.php"); ?>

    <script src="../public/assets/sign_in.js"></script>
</body>
</html>