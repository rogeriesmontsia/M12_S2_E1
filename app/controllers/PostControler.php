<?php 
require_once '../models/PostModel.php';

class PostControl {
    

    private $postModel;

    public function __construct() {
        $this->postModel = new PostModel();
    }

    //Entre $productId que es el id del producte 
    // $nimatge el nom de la imatge que es solicita
    public function mostrarTitol($postId) {
        $title = $this->postModel->obtenirTitle($postId);
        return $title[0]["title"]; //sols tindra un resultat
    }

    public function mostrarDescripcio($postId) {
        $descr = $this->postModel->obtenirDescripcio($postId);
        return $descr[0]["description"]; //sols tindra un resultat
    }

    public function mostrarPosts ($postId) {
        $tots = $this->postModel->obtenirTots($postId);


    }

    public function mostrarAdvertisements ($postId) {
        $nom = $this->postModel->obtenirTots($postId);

    }

    public function llistatPostImagens () {
        $post = $this->postModel->obtenirPostImagens();
        $jsonP =  json_encode($post);
        header('Content-Type: application/json');
        echo $jsonP;
    }

}

?>