<?php

require_once __DIR__ . '../../include/config.php';

class modele_client {
    public $id; 
    public $nom_complet; 

    /***
     * Fonction permettant de construire un objet de type modele_client
     */
    public function __construct($id, $nom, $prenom) {
        $this->id = $id;
        $this->nom_complet = $nom . ', ' . $prenom;
    }

    /***
     * Fonction permettant de se connecter à la base de données
     */
    static function connecter() {
        
        $mysqli = new mysqli(Db::$host, Db::$username, Db::$password, Db::$database);

        // Vérifier la connexion
        if ($mysqli -> connect_errno) {
            echo "Échec de connexion à la base de données MySQL: " . $mysqli -> connect_error;   // Pour fins de débogage
            exit();
        } 

        return $mysqli;
    }

    /***
     * Fonction permettant de récupérer l'ensemble des produits 
     */
    public static function ObtenirTous() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT * FROM clients ORDER BY nom_contact, prenom_contact");

        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new modele_client($enregistrement['id'], $enregistrement['nom_contact'], $enregistrement['prenom_contact']);
        }

        return $liste;
    }
}

?>