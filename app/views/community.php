<?php
session_start();
<?php include("./header/header.php");?>
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comunnity</title>
</head>
<body>
    
    <div class="d-flex align-items-center justify-content-center" style="height: 300px;" >
    <div class="container text-center">
        <h1>Welcome, <?php $_SESSION["username"]?></h1>
    
        <div class="mt-4">
            <button>Ir a Anuncios de Productos</button>
        </div>
        <div class="mt-4">
            <button>Ir a Alquiler de herramientas</button>
        </div>
    </div>
    </div>
    <?php include("./footer/footer.php");?>
</body>
</html>
<?php
} else {
    ?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
        <?php include("./header/header.php");?>

        <body>
            <div class="container mt-3 w-50">
                <div class="alert alert-danger" role="alert">
                    Para acceder <a href="./sign_up.php" class="alert-link">regístrate</a> o <a href="./sign_in.php" class="alert-link">inicia sesión</a>
                </div>
            </div>
        </body>
            <?php
        }
        include('./footer/footer.php');
        ?>
        <?php include './footer/footer.php'; ?>

        </html>