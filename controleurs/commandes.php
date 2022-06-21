<?php

require_once __DIR__ . '/../modeles/commandes.php';

class ControleurCommandes {
    
    /***
     * Fonction permettant de récupérer l'ensemble des commandes et de les afficher sous forme de tableau avec boutons d'actions
     */
    function afficherListeCommandes() {
        $commandes = modele_commande::ObtenirTous();
        require  __DIR__ . '/../vues/commandes/liste.php';
    }

    /***
     * Fonction permettant d'ajouter une commande
     */
    function ajouter() {
        if(isset($_POST['date_commande']) && isset($_POST['client_id'])) {
            $message = modele_commande::ajouter($_POST['date_commande'], $_POST['client_id']);
            echo $message;
        } else {
            $erreur = "Impossible d'ajouter une commande. Des informations sont manquantes";
            require __DIR__ . '/../vues/erreur.php';
        }
    }
}

?>