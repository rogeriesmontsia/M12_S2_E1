<?php 
require_once '../models/PostModel.php';

class PostControl {
    

    private $postControl;

    public function __construct() {
        $this->postControl = new PostModel();
    }

    //Entre $productId que es el id del producte 
    // $nimatge el nom de la imatge que es solicita
    public function mostrarTitol($productId) {
        $preu = $this->postControl->obtenirTitle($productId);
        return $preu[0]["title"]; //sols tindra un resultat
    }

    public function mostrarDescripcio($productId) {
        $nom = $this->postControl->obtenirDescripcio($productId);
        return $nom[0]["description"]; //sols tindra un resultat
    }
}

?>