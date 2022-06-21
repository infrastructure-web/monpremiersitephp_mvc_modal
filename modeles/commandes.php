<?php

require_once __DIR__ . '../../include/config.php';

class modele_commande {
    public $id; 
    public $date_commande;
    public $client_id; 
    public $nom_client;
    public $prenom_client;
    public $telephone_client;
    public $adresse_client;

    /***
     * Fonction permettant de construire un objet de type modele_produit
     */
    public function __construct($id, $client_id, $date_commande, $nom_client, $prenom_client, $telephone, $adresse, $ville, $code_postal, $province, $pays) {
        $this->id = $id;        
        $this->client_id = $client_id;
        $this->date_commande = $date_commande;
        $this->nom_client = $nom_client;
        $this->prenom_client = $prenom_client;
        $this->telephone_client = $telephone;
        $this->adresse_client = $adresse .  ', ' . $ville . ', ' . $code_postal . ', ' . $province . ', ' . $pays;
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
     * Fonction permettant de récupérer l'ensemble des commandes 
     */
    public static function ObtenirTous() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT commandes.id AS commande_id, clients.id AS client_id, dateCommande, nom_contact, prenom_contact, telephone, adresse, ville, code_postal, province, pays FROM commandes INNER JOIN clients on commandes.fk_client = clients.id;");

        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new modele_commande($enregistrement['commande_id'], $enregistrement['client_id'], $enregistrement['dateCommande'], $enregistrement['nom_contact'], 
                        $enregistrement['prenom_contact'], $enregistrement['telephone'], $enregistrement['adresse'], $enregistrement['ville'], 
                        $enregistrement['code_postal'], $enregistrement['province'], $enregistrement['pays']);
        }

        return $liste;
    }

    /***
     * Fonction permettant d'ajouter une commande
     */
    public static function ajouter($date_commande, $client_id) {
        $message = '';

        $mysqli = self::connecter();
        
        // Création d'une requête préparée
        if ($requete = $mysqli->prepare("INSERT INTO commandes(dateCommande, fk_client) VALUES(?, ?)")) {      

        /************************* ATTENTION **************************/
        /* On ne fait présentement peu de validation des données.     */
        /* On revient sur cette partie dans les prochaines semaines!! */
        /**************************************************************/

        $requete->bind_param("si", $date_commande, $client_id);

        if($requete->execute()) { // Exécution de la requête
            $message = "Commande ajoutée";  // Message ajouté dans la page en cas d'ajout réussi
        } else {
            $message =  "Une erreur est survenue lors de l'ajout: " . $requete->error;  // Message ajouté dans la page en cas d’échec
        }

        $requete->close(); // Fermeture du traitement

        } else  {
            echo "Une erreur a été détectée dans la requête utilisée : ";   // Pour fins de débogage
            echo $mysqli->error;
            echo "<br>";
            exit();
        }

        return $message;
    }
}

?>