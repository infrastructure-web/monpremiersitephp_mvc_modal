<?php

require_once __DIR__ . '../../include/config.php';

class modele_produit {
    public $id; 
    public $nom;
    public $prix_vente;
    public $qte_stock;

    /***
     * Fonction permettant de construire un objet de type modele_produit
     */
    public function __construct($id, $nom, $prix_coutant, $prix_vente, $qte_stock) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prix_coutant = $prix_coutant;
        $this->prix_vente = $prix_vente;
        $this->qte_stock = $qte_stock;
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

        $resultatRequete = $mysqli->query("SELECT id, nom, prix_coutant, prix_vente, qte_stock FROM produits ORDER BY nom");

        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new modele_produit($enregistrement['id'], $enregistrement['nom'], $enregistrement['prix_coutant'], $enregistrement['prix_vente'], $enregistrement['qte_stock']);
        }

        return $liste;
    }

    /***
     * Fonction permettant de récupérer un produit en fonction de son identifiant
     */
    public static function ObtenirUn($id) {
        $mysqli = self::connecter();

        if ($requete = $mysqli->prepare("SELECT * FROM produits WHERE id=?")) {  // Création d'une requête préparée 
            $requete->bind_param("s", $id); // Envoi des paramètres à la requête

            $requete->execute(); // Exécution de la requête

            $result = $requete->get_result(); // Récupération de résultats de la requête¸
            
            if($enregistrement = $result->fetch_assoc()) { // Récupération de l'enregistrement
                $produit = new modele_produit($enregistrement['id'], $enregistrement['nom'], $enregistrement['prix_coutant'], $enregistrement['prix_vente'], $enregistrement['qte_stock']);
            } else {
                //echo "Erreur: Aucun enregistrement trouvé.";  // Pour fins de débogage
                return null;
            }   
            
            $requete->close(); // Fermeture du traitement 
        } else {
            echo "Une erreur a été détectée dans la requête utilisée : ";   // Pour fins de débogage
            echo $mysqli->error;
            return null;
        }

        return $produit;
    }

    /***
     * Fonction permettant d'ajouter un produit
     */
    public static function ajouter($nom, $prix_coutant, $prix_vente, $qte_stock) {
        $message = '';

        $mysqli = self::connecter();
        
        // Création d'une requête préparée
        if ($requete = $mysqli->prepare("INSERT INTO produits(nom, prix_coutant, prix_vente, qte_stock) VALUES(?, ?, ?, ?)")) {      

        /************************* ATTENTION **************************/
        /* On ne fait présentement peu de validation des données.     */
        /* On revient sur cette partie dans les prochaines semaines!! */
        /**************************************************************/

        $requete->bind_param("sddi", $nom, $prix_coutant, $prix_vente, $qte_stock);

        if($requete->execute()) { // Exécution de la requête
            $message = "Produit ajouté";  // Message ajouté dans la page en cas d'ajout réussi
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

    /***
     * Fonction permettant d'éditer un produit
     */
    public static function editer($id, $nom, $prix_coutant, $prix_vente, $qte_stock) {
        $message = '';

        $mysqli = self::connecter();
        
        // Création d'une requête préparée
        if ($requete = $mysqli->prepare("UPDATE produits SET nom=?, prix_coutant=?, prix_vente=?, qte_stock=? WHERE id=?")) {      

        /************************* ATTENTION **************************/
        /* On ne fait présentement peu de validation des données.     */
        /* On revient sur cette partie dans les prochaines semaines!! */
        /**************************************************************/

        $requete->bind_param("sddii", $nom, $prix_coutant, $prix_vente, $qte_stock, $id);

        if($requete->execute()) { // Exécution de la requête
            $message = "Produit modifié";  // Message ajouté dans la page en cas d'ajout réussi
        } else {
            $message =  "Une erreur est survenue lors de l'édition: " . $requete->error;  // Message ajouté dans la page en cas d’échec
        }

        $requete->close(); // Fermeture du traitement

        } else  {
            echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;
            echo "<br>";
            exit();
        }

        return $message;
    }

    /***
     * Fonction permettant de supprimer un produit
     */
    public static function supprimer($id) {
        $message = '';

        $mysqli = self::connecter();
        
        // Création d'une requête préparée
        if ($requete = $mysqli->prepare("DELETE FROM produits WHERE id=?")) {      

        /************************* ATTENTION **************************/
        /* On ne fait présentement peu de validation des données.     */
        /* On revient sur cette partie dans les prochaines semaines!! */
        /**************************************************************/

        $requete->bind_param("i", $id);

        if($requete->execute()) { // Exécution de la requête
            $message = "Produit supprimé";  // Message ajouté dans la page en cas d'ajout réussi
        } else {
            $message =  "Une erreur est survenue lors de la suppression: " . $requete->error;  // Message ajouté dans la page en cas d’échec
        }

        $requete->close(); // Fermeture du traitement

        } else  {
            echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;
            echo "<br>";
            exit();
        }

        return $message;
    }
}

?>