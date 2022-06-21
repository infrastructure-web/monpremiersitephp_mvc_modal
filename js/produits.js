function ouvrirDialogueFiche(id) {
    console.log('appel de la méthode ouvrirDialogueFiche'); 
    console.log(id); // Pour débogage
    dialogue = document.getElementById("dialogue-fiche");
    
    const produit = getProduit(id).then(produit => { 
        console.log(produit);
        if (produit) {
            document.getElementById("dialogue-fiche-nom").textContent = produit.produit;

            document.getElementById("dialogue-fiche-prix-vente").textContent = produit.prix_vente;

            dialogue.showModal();
        } 
    });
    
}

function ouvrirDialogueAjout() {
    console.log('appel de la méthode ouvrirDialogueAjout'); 
    dialogue = document.getElementById("dialogue-formulaire-ajout");
    dialogue.showModal();
}

function ouvrirDialogueEdition(id) {
    console.log('appel de la méthode ouvrirDialogueEdition'); 
    console.log(id); // Pour débogage
    dialogue = document.getElementById("dialogue-formulaire-edition");
    const produit = getProduit(id).then(produit => {
        console.log(produit);
        if (produit) {

            document.getElementById("dialogue-formulaire-edition-id").value = produit.id;
            document.getElementById("dialogue-formulaire-edition-code").value = produit.code;
            document.getElementById("dialogue-formulaire-edition-nom").value = produit.produit;
            document.getElementById("dialogue-formulaire-edition-prix-unitaire").value = produit.prix_unitaire;
            document.getElementById("dialogue-formulaire-edition-prix-vente").value = produit.prix_vente;
            document.getElementById("dialogue-formulaire-edition-qte-stock").value = produit.qte_stock;

            dialogue.showModal();
        }
    });
}

function ouvrirDialogueSuppression(id) {
    console.log('appel de la méthode ouvrirDialogueSuppression'); 
    console.log(id); // Pour débogage
    dialogue = document.getElementById("dialogue-formulaire-suppression");
    
    const produit = getProduit(id).then(produit => {
        console.log(produit);
        if (produit) {
            document.getElementById("dialogue-suppression-nom").textContent = produit.produit;
            document.getElementById("dialogue-formulaire-suppression-id").value = produit.id;

            dialogue.showModal();
        }
    });
}


async function getProduit(id) {
    let response = await fetch('api/produits/?id=' + id);
        
    if (response.ok) {
        return await response.json();   // retourne le produit
    } else {
        alert('Il y a eu un problème avec l\'opération fetch. Voir la console pour plus de détails ');
        console.log(await response.json()); // affiche l'erreur
    }
}