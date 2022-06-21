<table>
    <tr>
        <th>#</th>  
        <th>Date</th>       
        <th>Nom</th>    
        <th>Prenom</th>          
        <th>Téléphone</th>
        <th>Adresse</th>
    </tr>

    <?php
        foreach ($commandes as $commande) {
    ?>
        <tr>
            <td><?= $commande->id ?></td>
            <td><?= $commande->date_commande ?></td>
            <td><?= $commande->nom_client ?></td>
            <td><?= $commande->prenom_client ?></td>
            <td><?= $commande->telephone_client ?></td>            
            <td><?= $commande->adresse_client ?></td>
        </tr>
    <?php
        }
    ?>
</table>