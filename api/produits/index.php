<?php

require_once '../../controleurs/produits.php';

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    $controleurProduits=new ControleurProduits;
    $controleurProduits->afficherFicheJSON();
}

?>