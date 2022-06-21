<?php
    require_once 'controleurs/commandes.php';
    require_once 'controleurs/clients.php';

    $title = 'Mon super site - Ajouter une commande';
    require 'vues/entete.php';
    
    if (isset($_POST['boutonAjouter'])) {        
        $controleurCommandes=new ControleurCommandes;
        $controleurCommandes->ajouter();
    }
?>


    <div class="container">

      <h1>Ajouter une commande</h1>

      <form method="POST">
        <div>
          <div>
            <label for="code">Date de la commande *</label>
            <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
            <input type="date" id="date_commande" name="date_commande" required >
          </div>
          <div>
            <label for="nom">Client *</label>
            <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
            <?php
                $controleurClients=new ControleurClients;
                $controleurClients->afficherListeDeroulanteClients();
            ?>

            <div>À venir la semaine prochaine : Items de commande!</div>
          </div>
        </div>

        <button name="boutonAjouter" type="submit">Ajouter la commande</button><br>
      </form>

      <a href="commandes.php">Retour à la liste des commandes</a>
    </div>
    
<?php
    require 'vues/pied.php';
?>