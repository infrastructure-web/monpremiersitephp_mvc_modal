<dialog id="dialogue-formulaire-ajout">
    <form method="POST">
        <div>
          <div>
            <label for="code">Code *</label>
            <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
            <input type="text" id="code" name="code" required maxlength="25">
          </div>
          <div>
            <label for="nom">Nom du produit *</label>
            <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
            <input type="text" id="nom" name="nom" required minlength="2" maxlength="50">
          </div>
        </div>

        <div>
          <div>
            <label for="prix_unitaire">Prix unitaire (coûtant) *</label>
            <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
            <input type="number" step=".01" id="prix_unitaire" name="prix_unitaire" required>
          </div>
          <div>
            <label for="prix_vente">Prix de vente *</label>
            <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
            <input type="number" step=".01" id="prix_vente" name="prix_vente" required>
          </div>
          <div>
            <label for="qte_stock">Quantité en stock</label>
            <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
            <input type="number" id="qte_stock" name="qte_stock" required>
          </div>
        </div>

        <button name="boutonAjouter" type="submit">Ajouter le produit</button>
        <button type="button" onclick="this.closest('dialog').close()">Annuler</button>
    </form>
</dialog>
    