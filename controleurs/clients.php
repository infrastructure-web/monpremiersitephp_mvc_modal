<?php

require_once __DIR__ . '/../modeles/clients.php';

class ControleurClients {
    
    /***
     * Fonction permettant de récupérer l'ensemble des clients et de les afficher sous forme de liste déroulante
     */
    function afficherListeDeroulanteClients() {
        $clients = modele_client::ObtenirTous();
        require  __DIR__ . '/../vues/clients/liste-deroulante.php';
    }
}

?>