<dialog id="dialogue-formulaire-suppression">
  <div class="card">
    <img src="https://picsum.photos/200" alt="une photo aléatoire">
    <div>
      Voulez-vous vraiment supprimer ce produit?
      <h3><b>Nom du produit : <span id="dialogue-suppression-nom"></span></b></h3>
    </div>
  </div>

  <form method="POST">
      <button name="boutonSupprimer" type="submit">Supprimer le produit</button>
      <button type="button" onclick="this.closest('dialog').close()">Annuler</button>      
      <input type="hidden" id="dialogue-formulaire-suppression-id" name="id" value="">
  </form>
</dialog>