<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Entrada</title>
</head>
<body>
    <?php include("./header/header.php"); ?>
    <div class="container-sm">
        <div class="row justify-content-center">
            <h2>Nueva Entrada</h2>
        </div>
        <div class="row">
            <div class="col"></div>    
            <div class="col-sm">
                <form action="insertar-contenido.php" method="post" name="form1">
                    <table>
                    <div class="form-group">
                        <tr>
                            <td> <label for="campo_titulo">Titulo</label> </td>
                            <td> <input type="text" name="campo_titulo" id="campo_titulo" placeholder="Escribe un título"> </td>
                        </tr>
                        <tr> 
                            <td> <label for="area_comentarios">Descripción:</label> </td>
                            <td> <textarea name="area_comentarios" id="area_comentarios" rows="10" cols="50" placeholder="Escribe aquí tu comentario"> </textarea></td> 
                        </tr>
                            <input type="hidden" name="MAX_TAM" value="2097152">
                        <tr>
                            <td colspan="2">Seleccione una imagen con tamaño inferior a 2 MB</td>
                        </tr>      
                        <tr>
                            <td colspan="2"> <input type="file" name="image" id="image"> </td>
                        </tr>
                        <tr>
                            <td> <input type="submit" name="boton_enviar" id="boton_enviar" value="Enviar"> </td>
                        </tr>
                        <tr>
                            <td> <a href="mostrar-blog.php">Página de visualización del Blog</a> </td>
                        </tr>
                </div>
                </table>
            </form>
        </div>
    </div>
</body>
    <?php require("./footer/footer.php"); ?>
</html>