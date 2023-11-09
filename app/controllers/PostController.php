<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Post</title>
</head>
<body>
    
<?php
    $miconexion = msqli_connect("localhost", "root", "admin", "dbblog");

    /*Comprobamos conexion */
    if(!$miconexion){
        echo "La conexion ha fallado: " . mysqli_error();
        exit();
    }

    if($_FILES['image']['error']){

        switch($_FILES['image']['error']){
            case 1: // error exceso de tamaño
                echo "El fichero subido excede el tamaño";
                break;
            case 2: //error exceso de tamaño archivo marcado desde formulario
                echo "El fichero excede los 2MB";
                break;
            case 3 : //Corrupcion de archivo
                echo "El envío del archivo se interrumpió";
                break;
            case 4: //No hay fichero
                echo "No se ha subido ningún archivo"
                break;
        }
    }else{
        echo "Entrada subida correctamente<br>";
        
        if((isset($_FILES['image']['name']) && ($_FILES['image']['error']==UPLOAD_ERR_OK))){

            $destino_de_ruta = "imagenes/";

            move_uploaded_file($_FILES['image']['tmp_name'], $destino_de_ruta.$_FILES['image']['name']);

            echo "El archivo " . $_FILES['image']['name'] . "Se ha copiado al directorio imágenes";
        }else{

            echo "El archivo no se ha podido subir";
        }


    }

    $eltitulo=$_POST['campo_titulo'];
    $lafecha=date("Y-m-d H:i:s");
    $elcomentario=$_POST['area_comentarios'];
    $laimagen=$_FILES['imagen']['name'];

    $miconsulta="INSERT INTO contenido (Titulo, Fecha, Comment, Imagen) VALUES('".$eltitulo. "','".$lafecha. "', '".$elcomentario. "', '".$laimagen. "')";

    $resultado = mysqli_query($miconexion,$miconsulta);

    /*Cerramos la conexión */

    mysqli_close($miconexion);

    echo "<br> Se a agregado el comentario con éxito<br> <br>"
?>

</body>
</html>