<!-- Affichage en mode "tableau" -->
<h2>Affichage en mode "tableau" avec les options ajouter, afficher, modifier et supprimer</h2>

<button onclick="ouvrirDialogueAjout()">Ajouter</button>

<table>
    <tr>
        <th>Code</th>        
        <th>Nom du produit</th>        
        <th>Prix de vente</th>        
        <th>Quantité en stock</th>
        <th>Actions</th>
    </tr>

    <?php
        foreach ($produits as $produit) {
    ?>
        <tr>
            <td><?= $produit->code ?></td>
            <td><?= $produit->produit?></td>
            <td><?= $produit->prix_vente ?></td>
            <td><?= $produit->qte_stock ?></td>
            <td>
                <button onclick="ouvrirDialogueFiche(<?= $produit->id ?>)">Afficher</button>
                <button onclick="ouvrirDialogueEdition(<?= $produit->id ?>)">Modifier</button>
                <button onclick="ouvrirDialogueSuppression(<?= $produit->id ?>)">Supprimer</button>
            </td>
        </tr>
    <?php
        }
    ?>
</table>