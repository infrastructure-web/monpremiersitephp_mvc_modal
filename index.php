<?php
    $title = 'Mon super site - Accueil';
    require 'vues/entete.php'
?>


    <div class="container">
      <h1><?php echo 'Bonjour le monde!'; ?></h1>
	    Ma page d'accueil est vraiment géniale, non? :) <br><br>
      <a href="produits.php">Consulter la liste des produits</a><br>
      <a href="commandes.php">Consulter la liste des commandes</a>
    </div>

<?php
    require 'vues/pied.php';
?>







