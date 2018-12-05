<?php
if (Session::is_admin()) {
    $u = ModelProduit::select($_GET['idProduit']);
} else {
    $u = false;
}

if ($u != false) {
    $uChamp = 'updated';
    $uLabel = 'Mettre à jour';
    $uIdProduit = htmlspecialchars($u->get('idProduit'));
    $uNomProduit = htmlspecialchars($u->get('nomProduit'));
    $uIdCategorie = htmlspecialchars($u->get('idCategorie'));
    $uCouleurProduit = htmlspecialchars($u->get('couleurProduit'));
    $uDescriptionProduit = htmlspecialchars($u->get('descriptionProduit'));
    $uTailleProduit = htmlspecialchars($u->get('tailleProduit'));
    $uPoidsProduit = htmlspecialchars($u->get('poidsProduit'));
    $uAgeProduit = htmlspecialchars($u->get('ageProduit'));

} else {
    $uChamp = 'created';
    $uLabel = 'Créer';
    $uIdProduit = "";
    $uNomProduit = "";
    $uIdCategorie = "";
    $uCouleurProduit = "";
    $uDescriptionProduit = "";
    $uTailleProduit = "";
    $uPoidsProduit = "";
    $uAgeProduit = "";

}

echo '<form method="post" action="index.php?controller=produits&action=' . $uChamp . '">';
?>
  <fieldset>
    <legend>Produit :</legend>
<?php
if ($uChamp == 'updated') {
    echo <<< EOT
    <p>
      <label for="idProduit_id">Référence produit</label> :
    </p>
    <p>
      <input type="text" name="idProduit" value="$uIdProduit" id="idProduit_id" readonly/>
    </p>
EOT;
}
?>
    <p>
      <label for="nomProduit_id">Nom</label> :
    </p>
    <p>
<?php
echo '<input type="text" placeholder="Ex : Canard" name="nomProduit" value="' . $uNomProduit . '" id="nomProduit_id" required/>';
?>
    </p>
    <p>
      <label for="idCategorie_id">Catégorie</label> :
    </p>
    <p>
<?php
echo '<input type="text" placeholder="Ex : 1" name="idCategorie" value ="' . $uIdCategorie . '" id="idCategorie_id" required/>';
?>
    </p>
    <p>
      <label for="couleurProduit_id">Couleur</label> :
    </p>
    <p>
<?php
echo '<input type="text" placeholder="Ex : bleu" name="couleurProduit" value ="' . $uCouleurProduit . '" id="couleurProduit_id" required/>';
?>
    </p>
    <p>
      <label for="descriptionProduit_id">Description</label> :
    </p>
    <p>
<?php
echo '<input type="text" placeholder="Ex : Joli canard bleu en porcelaine" name="descriptionProduit" value ="' . $uDescriptionProduit . '" id="descriptionProduit_id" required/>';
?>
    </p>
    <p>
      <label for="tailleProduit_id">Taille</label> :
    </p>
    <p>
<?php
echo '<input type="text" placeholder="Ex : 1.54 m" name="tailleProduit" value ="' . $uTailleProduit . '" id="tailleProduit_id" required/>';
?>
    </p>
    <p>
      <label for="poidsProduit_id">Poids</label> :
    </p>
    <p>
<?php
echo '<input type="text" placeholder="Ex : 21 kg" name="poidsProduit" value ="' . $uPoidsProduit . '" id="poidsProduit_id" required/>';
?>
    </p>
    <p>
      <label for="ageProduit_id">Age</label> :
    </p>
    <p>
<?php
echo '<input type="text" placeholder="Ex : 51 ans" name="ageProduit" value ="' . $uPoidsProduit . '" id="poidsProduit_id" required/>';
?>
    </p>
    <p>
<?php
echo '<input type="submit" value="' . $uLabel . '" />';
?>
    </p>
  </fieldset>
</form>
