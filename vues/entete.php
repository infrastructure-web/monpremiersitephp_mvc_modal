<?php
  session_start();
?>

<!doctype html>
<html lang="fr">
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/styles.css">
  <script src="js/produits.js"></script>
  <title><?= $title ?></title>
 </head>
 <body>
    <nav> 
      Une navigation ici... 
       <a href="produits.php">Produits</a>
      <a href="commandes.php">Commandes</a>
        
      <? require 'vues/authentification/formulaire_authentification.php'; ?>
    </nav>

