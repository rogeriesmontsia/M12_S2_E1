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
        <form class="p-5">
            <div class="mb-4">
                <label for="nombre">Nom</label>
                <input type="text" class="form-control" id="nom" placeholder="Escriu el teu nom">
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" rows="3" placeholder="Escribe una descripción"></textarea>
            </div>

            <div id="dropzone">
                <p>Arrastra y suelta tus archivos aquí</p>
                <input type="file" id="fileInput" multiple style="display: none;">
                <table id="file-table" class = "table">
                    <tr id="row-1"></tr>
                    <tr id="row-2"></tr>
                </table>
            </div><br>
                    
            <div>
                <button type="submit" class="boto" >Enviar</button>
            </div>
        </form>
    </div><br>

    <?php
        include './footer/footer.php';
    ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src = "./header/js/dropbox.js"> </script>
</body>
</html>