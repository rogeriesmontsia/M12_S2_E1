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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/validacions_form_post.js"></script>
</head>
<body>
    <div class = "container">
        <form class="p-5" action = "#" method="POST" enctype="multipart/form-data" id = "form_post">
            <div class="mb-4">
                <label for="title">Titol</label>
                <input type="text" class="form-control" id="title" name = "title" placeholder="Escriu el titol" oninput="cleanAndValidate(this)">
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name = "description" rows="3" placeholder="Escribe una descripción" oninput="cleanAndValidate(this)"></textarea>
            </div>

            <div>
                <label>Seleccione el tipus de publicació que vol publicar:</label><br>
                <input type="radio" id="category1" name="category" value="post" onclick="cleanAndValidateRadio()">
                <label for="category">Post</label><br>
                <input type="radio" id="category2" name="category" value="adv" onclick="cleanAndValidateRadio()">
                <label for="category">Advertisements</label><br>
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
                <button class="boto" onclick="validateForm()">Enviar</button>
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
