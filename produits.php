<?php
    require_once 'controleurs/produits.php';
    
    $title = 'Mon super site - Liste des produits';
    require 'vues/entete.php';
    
    $controleurProduits=new ControleurProduits;

    if (isset($_POST['boutonAjouter'])) {        
        $controleurProduits->ajouter();
    } else if (isset($_POST['boutonEditer'])) {      
        $controleurProduits->editer();
    } else if (isset($_POST['boutonSupprimer'])) {        
        $controleurProduits->supprimer();
    } 
?>

    <div class="container">

        <h1>Liste des produits</h1>

        <?php
            $controleurProduits->afficherTableauGestion();
        ?>

    </div>

<?php
    require 'vues/pied.php';
?>



