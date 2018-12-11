<form method="post" action="index.php?controller=produits&action=imageAdded&idProduit=<?php echo $_GET['idProduit']; ?>">
  <fieldset>
    <legend>Ajouter une image au produit :</legend>
    <p>
      <label for="idImage">idImage</label> :
    </p>
    <p>
      <input type="text" placeholder="Ex : 2" name="idImage" id="idImage_id" required/>
    </p>
    <p>
      <input type="submit" value="Envoyer" />
    </p>
  </fieldset>
</form>
