<?php
require_once "../models/ImaPostModel.php";

define("RUTA", "../imatges/");

class ImaPostControl {
    

    private $imaPostModel;

    public function __construct() {
        $this->imaPostModel = new ImagePostModel();
    }

    //Entre $productId que es el id del producte 
    // $nimatge el nom de la imatge que es solicita
    public function mostrarImagen($postId, $nimatge) {
        $rutaImagen = $this->imaPostModel->obtenerNomImagens($postId);
        return (RUTA.$rutaImagen[$nimatge]["nom"]);
        
    }
}