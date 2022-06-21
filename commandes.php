<?php
    require_once 'controleurs/commandes.php';

    $title = 'Mon super site - Liste des commandes';
    require 'vues/entete.php';
?>

    <div class="container">
        <h1>Liste des commandes</h1>

        <a href="ajout_commande.php">Ajouter</a><br><br>

        <?php
            $controleurCommandes=new ControleurCommandes;
            $controleurCommandes->afficherListeCommandes();
        ?>
    </div>

<?php
    require 'vues/pied.php';
?>



