<?php

require_once __DIR__ . '/../modeles/produits.php';

class ControleurProduits {
    
    /***
     * Fonction permettant de récupérer l'ensemble des produits et de les afficher sous forme de tableau avec boutons d'actions
     */
    function afficherTableauGestion() {
        $produits = modele_produit::ObtenirTous();
        require  __DIR__ . '/../vues/produits/tableau-gestion.php';
        require __DIR__ . '/../vues/produits/dialogue-formulaire-ajout.php';
        require __DIR__ . '/../vues/produits/dialogue-fiche.php';
        require __DIR__ . '/../vues/produits/dialogue-formulaire-edition.php';
        require __DIR__ . '/../vues/produits/dialogue-formulaire-suppression.php';
    }

    /***
     * Fonction permettant de récupérer un produit et retourner les données au format JSON
     */
    function afficherFicheJSON() {
       header('Content-Type: application/json; charset=utf-8');
       if(isset($_GET["id"])) {
            $produit = modele_produit::ObtenirUn($_GET["id"]);
            if($produit) {  // ou if($produit != null)
                echo json_encode($produit);
            } else {
                http_response_code(404); // 404 : Not Found (https://developer.mozilla.org/fr/docs/Web/HTTP/Status/404)
                $erreur = "Aucun produit trouvé";
                echo json_encode($erreur);
            }
        } else {
            http_response_code(400);  // 400 : Not Found (https://developer.mozilla.org/fr/docs/Web/HTTP/Status/400)
            $erreur = "L'identifiant (id) du produit à afficher est manquant dans l'url";
            echo json_encode($erreur);
        }
    }

    /***
     * Fonction permettant d'ajouter un produit
     */
    function ajouter() {
        if(isset($_POST['code']) && isset($_POST['nom']) && isset($_POST['prix_unitaire']) && isset($_POST['prix_vente']) && isset($_POST['qte_stock'])) {
            $message = modele_produit::ajouter($_POST['code'], $_POST['nom'], $_POST['prix_unitaire'], $_POST['prix_vente'], $_POST['qte_stock']);
            echo $message;
        } else {
            $erreur = "Impossible d'ajouter un produit. Des informations sont manquantes";
            require __DIR__ . '/../vues/erreur.php';
        }
    }

    /***
     * Fonction permettant de modifier un produit
     */
    function editer() {
        if(isset($_POST['id'], $_POST['code']) && isset($_POST['nom']) && isset($_POST['prix_unitaire']) && isset($_POST['prix_vente']) && isset($_POST['qte_stock'])) {
            $message = modele_produit::editer($_POST['id'], $_POST['code'], $_POST['nom'], $_POST['prix_unitaire'], $_POST['prix_vente'], $_POST['qte_stock']);
            echo $message;
        } else {
            $erreur = "Impossible de modifier le produit. Des informations sont manquantes";
            require __DIR__ . '/../vues/erreur.php';
        }
    }

    /***
     * Fonction permettant de supprimer un produit
     */
    function supprimer() {
        if(isset($_POST['id'])) {
            $message = modele_produit::supprimer($_POST['id']);
            echo $message;
        } else {
            $erreur = "Impossible de supprimer le produit. Des informations sont manquantes";
            require __DIR__ . '/../vues/erreur.php';
        }
    }

}

?>