<?php
    require_once 'controleurs/produits.php';
    
    $controleurProduits=new ControlleurProduit;

    if (isset($_POST['boutonSupprimer'])) {        
        $controleurProduits->supprimer();
    } 
?>

<!doctype html>
<html lang="fr">
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/styles.css">
  <title>Mon super site - Suppression d'un produit</title>
 </head>
 <body>
    <h1>Formulaire de suppression d'un produit</h1>

    <?php
         $controleurProduits->afficherFormulaireSuppression();
    ?>

    <a href="produits.php">Retour à la liste des produits</a>
 </body>
</html>


