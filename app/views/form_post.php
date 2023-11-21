<?php
    session_start();

    include './header/header.php';
    if (isset($_GET['creat'])){
        echo "S'ha creat correctament el post";
    }
?>
<head>
    <title>Formulario Post/Adv</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../css/form_post.css" rel = "stylesheet">
</head>
<body>
    <div class = "container">
        <form class="p-5" action = "#" method="POST" enctype="multipart/form-data" id = "form_post">
            <div class="mb-4">
                <span role="alert" id="titleError" aria-hidden="true">
                    Por favor ingresa el título.
                </span>
                <label for="title">Titol</label>
                <input type="text" class="form-control" id="title" name = "title" placeholder="Escriu el titol" required maxlength="25">
            </div>

            <div class="form-group">
                <span role="alert" id="descripError" aria-hidden="true">
                    Por favor ingresa la descripción.
                </span>
                <label for="description">Descripción</label>
                <textarea class="form-control" id="description" name = "description" rows="3" placeholder="Escribe una descripción" required maxlength="500"></textarea>
            </div>

            <div>
                <label id ="radioLabel">Seleccione el tipo de publicación:</label><br>
                <label id="categoryError">Debe seleccionar una opción.</label>
                <input type="radio" id="category1" name="category" value="post" required>
                <label for="category1">Post</label><br>
                <input type="radio" id="category2" name="category" value="adv">
                <label for="category2">Anuncio</label><br>
            </div>

            <div >
                <label for="foto">Selecciona una foto:</label>
                <input type="file" name="postImage" accept="image/*" multiple required>
            </div>
          
            <div>
                <input value = "1" name = "id_user" type = "hidden">
                <input value = "15" name = "id_community" type = "hidden">
            </div>
            <div>
                <button class="boto" id ="submit">Enviar</button>
            </div>
        </form>


    </div><br>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src = "../js/validacions_form_post.js"> </script>
</body>

<?php
    include './footer/footer.php';
?>
