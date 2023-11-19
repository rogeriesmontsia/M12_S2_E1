<?php 
require_once '../models/PostModel.php';

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
        $exito = $this->postModel->setAllPost($user, $commu, $title, $descript, $category);

        if ($exito) {
            echo "Información guardada correctamente.";
        } else {
            echo "Error al guardar la información.";
        }
    }
}

$controller = new PostController ();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $descript = $_POST['description'];
    $user = $_POST['id_user'];
    $commu = $_POST['id_community'];

    $controller->guardarPost($user, $commu, $title, $descript, $category);
}


?>