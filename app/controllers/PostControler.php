<?php 
require_once '../models/PostModel.php';

class PostControl {
    

    private $postControl;

    public function __construct() {
        $this->postControl = new PostModel();
    }

    //Entre $productId que es el id del producte 
    // $nimatge el nom de la imatge que es solicita
    public function mostrarTitol($postId) {
        $title = $this->postControl->obtenirTitle($postId);
        return $title[0]["title"]; //sols tindra un resultat
    }

    public function mostrarDescripcio($postId) {
        $descr = $this->postControl->obtenirDescripcio($postId);
        return $descr[0]["description"]; //sols tindra un resultat
    }

    public function mostrarPosts ($postId) {
        $tots = $this->postControl->obtenirTots($postId);


    }

    public function mostrarAdvertisements ($postId) {
        $nom = $this->postControl->obtenirTots($postId);

    }


}

?>