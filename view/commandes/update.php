<?php
if (Session::is_admin()) {
    $u = ModelCommandes::select($_GET['idCommande']);
} else {
    $u = false;
}

if ($u != false) {
    $uChamp = 'updated';
    $uLabel = 'Mettre à jour';
    $uIdCommande = htmlspecialchars($u->get('idCommande'));
    $uIdUtilisateur = htmlspecialchars($u->get('idUtilisateur'));
    $uDateCommande = htmlspecialchars($u->get('dateCommande'));
    $uIdStatut = htmlspecialchars($u->get('idStatut'));
    $uMontantCommande = htmlspecialchars($u->get('montantCommande'));
    $uIdAdresseLivraison = htmlspecialchars($u->get('idAdresseLivraison'));
    $uIdAdresseFacturation = htmlspecialchars($u->get('idAdresseFacturation'));
} else {
    $uChamp = 'created';
    $uLabel = 'Créer';
    $uIdCommande = "";
    $uIdUtilisateur = "";
    $uDateCommande = "";
    $uIdStatut = "";
    $uMontantCommande = "";
    $uIdAdresseLivraison = "";
    $uIdAdresseFacturation = "";

}

echo '<form method="post" action="index.php?controller=produits&action=' . $uChamp . '">';
?>
  <fieldset>
    <legend>Commande :</legend>
<?php
if ($uChamp == 'updated') {
    echo <<< EOT
    <p>
      <label for="idCommande_id">Numéro de commande </label> :
    </p>
    <p>
      <input type="text" name="idCommande" value="$uIdCommande" id="idCommande_id" readonly/>
    </p>
EOT;
}
?>
    <p>
      <label for="idUtilisateur_id">Numéro d'utilisateur</label> :
    </p>
    <p>
<?php
echo '<input type="text" placeholder="Ex : 1" name="idUtilisateur" value="' . $uIdUtilisateur . '" id="idUtilisateur_id" required/>';
?>
    </p>
    <p>
      <label for="dateCommande_id">Date</label> :
    </p>
    <p>
<?php
echo '<input type="text" placeholder="Ex : 1" name="dateCommande" value ="' . $uDateCommande . '" id="dateCommande_id" required/>';
?>
    </p>
    <p>
      <label for="idStatut_id">Statut</label> :
    </p>
    <p>
<?php
echo '<input type="text" placeholder="Ex : passée" name="idStatut" value ="' . $uIdStatut . '" id="idStatut_id" required/>';
?>
    </p>
    <p>
      <label for="montantCommande_id">Montant</label> :
    </p>
    <p>
<?php
echo '<input type="text" placeholder="Ex : 2 €" name="montantCommande" value ="' . $uMontantCommande . '" id="montantCommande_id" required/>';
?>
    </p>
    <p>
      <label for="idAdresseLivraison_id">Adresse de livraison</label> :
    </p>
    <p>
<?php
echo '<input type="text" placeholder="Ex : 2 rue Albert Canard" name="idAdresseLivraison" value ="' . $uIdAdresseLivraison . '" id="idAdresseLivraison_id" required/>';
?>
    </p>
    <p>
      <label for="idAdresseFacturation_id">Adresse de facturation</label> :
    </p>
    <p>
<?php
echo '<input type="text" placeholder="Ex : 2 rue Albert Canard" name="idAdresseFacturation" value ="' . $uIdAdresseFacturation . '" id="idAdresseFacturation_id" required/>';
?>
    </p>
    <p>
<?php
echo '<input type="submit" value="' . $uLabel . '" />';
?>
    </p>
  </fieldset>
</form>
