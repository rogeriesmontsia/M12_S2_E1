<?php 
require_once '../models/PostModel.php';
define("RUTA", "../imatges/");

class PostController {
    

    private $postModel;

    public function __construct() {
        $this->postModel = new PostModel();
    }

    //Entre $productId que es el id del producte 
    // $nimatge el nom de la imatge que es solicita
    public function mostrarTitol($postId) {
        $title = $this->postModel->getTitle($postId);
        return $title[0]["title"]; //sols tindra un resultat
    }

    public function mostrarDescripcio($postId) {
        $descr = $this->postModel->getDescripcio($postId);
        return $descr[0]["description"]; //sols tindra un resultat
    }

    public function mostrarPosts ($postId) {
        $tots = $this->postModel->getTots($postId);
        return $tots;

    }

    public function mostrarAdvertisements ($postId) {
        $nom = $this->postModel->getTots($postId);
        return $nom;
    }

    public function llistatPostImagens () {
        $post = $this->postModel->getPostImagens();
        header('Content-Type: application/json');
        echo json_encode($post);
    }

    public function llistatAdvImagens () {
        $adv = $this->postModel->getAdvImagens();
        header('Content-Type: application/json');
        echo json_encode($adv);
    }

    public function guardarPost ($user, $commu, $title, $descript, $category) {
        try {
             $exito = $this->postModel->setAllPost($user, $commu, $title, $descript, $category);
        } catch (PDOException $e) {
            throw new Exception("Error al conectar a la base de datos: " . $e->getMessage());
        }
       
    }

    public function guardarImagenes ($idPost, $ruta) {
        try {
            $exito = $this->postModel->setImagePost($idPost, $ruta);
        } catch (PDOException $e) {
            throw new Exception("Error al conectar a la base de datos: " . $e->getMessage());
        } ?>
        <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../views/form_post.php?creat=ok">`;

    <?php }

    public function ultim() {
        return $this->postModel->ultimAfegit();
    }

    //Entre $productId que es el id del producte 
    // $nimatge el nom de la imatge que es solicita
    public function mostrarImagen($postId) {
        $rutaImagen = $this->postModel->obtenerNomImagens($postId);
        return (RUTA.$rutaImagen[0]["nom"]);
    }
}

$controller = new PostController ();
//domes filtrarem els que es pot introduir texte
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = htmlspecialchars($_POST['title']); 
    $category = $_POST['category'];
    $descript =htmlspecialchars($_POST['description']);
    $user = $_POST['id_user'];
    $commu = $_POST['id_community'];
    $files = $_FILES['postImage']['name'];

    // Verificar si se ha enviado un archivo
if ($_FILES['postImage']['error'] == UPLOAD_ERR_OK) {
    // Verificar el tipo MIME del archivo
    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg']; //permitim sols aquestes extensions
    if (in_array($_FILES['postImage']['type'], $allowedTypes)) {
        // Obtener información sobre el archivo
        $controller->guardarPost($user, $commu, $title, $descript, $category);
        $idPost = $controller->ultim(); //coneixer l'id del ultim insert
        $nombre = $idPost . "ima." . pathinfo($_FILES['postImage']['name'], PATHINFO_EXTENSION);
        $ruta = RUTA . $nombre;

        // Mover el archivo temporal al destino deseado
        if (move_uploaded_file($_FILES['postImage']['tmp_name'], $ruta)) {
            echo 'Archivo subido correctamente.';
            $controller->guardarImagenes($idPost, $nombre);
        } else {
            echo 'Error al subir el archivo.';
        }
    } else {
        echo 'Tipo de archivo no permitido.';
    }
} else {
    echo 'Error en la carga del archivo. Código de error: ' . $_FILES['postImage']['error'];
}
    

}


?>