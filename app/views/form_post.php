<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="./header/css/style.css">
</head>
<body>
    <?php 
        include './header/header.php';
    ?>
    <div class = "container">
        <form class="p-5" action = "../controllers/PostControler.php" method="POST" >
            <div class="mb-4">
                <label for="title">Titol</label>
                <input type="text" class="form-control" id="title" name = "title" placeholder="Escriu el teu nom">
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name = "description" rows="3" placeholder="Escribe una descripción"></textarea>
            </div>

            <div id="dropzone">
                <p>Arrastra y suelta tus archivos aquí</p>
                <input type="file" id="fileInput" name = "imatges[]" multiple style="display: none;" enctype="multipart/form-data">
                <table id="file-table" name = "images" class = "table">
                    <tr id="row-1"></tr>
                    <tr id="row-2"></tr>
                </table>
            </div><br>
                    
            <div>
                <input value = "1" name = "id_user" type = "hidden">
                <input value = "15" name = "id_community" type = "hidden">
                <input value = "post" name = "category" type = "hidden">


            </div>
            <div>
                <button type="submit" class="boto" >Enviar</button>
            </div>
        </form>
    </div><br>

    <?php
        include './footer/footer.php';
    ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src = "../js/dropbox.js"> </script>
</body>
</html>