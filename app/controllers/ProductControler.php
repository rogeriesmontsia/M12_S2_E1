<?php
session_start();
include "../models/Product.php";

$title = $_POST["title"];
$cat = $_POST["category"];
$desc = $_POST["descripcio"];
print($desc);

if (isset($_FILES['imatges']) && is_array($_FILES['imatges']['name'])) {
    $uploadDirectory = '../imatges/'; // Directorio de destino para las imágenes

    foreach ($_FILES['imatges']['name'] as $key => $name) {
        $tmpName = $_FILES['imatges']['tmp_name'][$key];
        $newName = $uploadDirectory . $name;

        if (move_uploaded_file($tmpName, $newName)) {
            // La imagen se ha subido exitosamente
            echo "Imagen '$name' subida exitosamente.<br>";
        } else {
            // Hubo un error al subir la imagen
            echo "Error al subir la imagen '$name'.<br>";
        }
    }
} else {
    echo "No se han subido imágenes.";
}


/* print($total_archivos);
print($title); */



?>