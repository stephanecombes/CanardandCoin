<?php
if (isset($_GET['login'])) {
    $u = ModelUtilisateur::select($_GET['login']);
} else {
    $u = false;
}

if ($u != false) {
    $uChamp = 'updated';
    $uIdUtilisateur = htmlspecialchars($u->get('idUtilisateur'));
    $uLabel = 'Mettre à jour';
} else {
    $uChamp = 'created';
    $uLabel = 'Créer';
}

echo '<form method="post" action="index.php?controller=utilisateurs&action=' . $uChamp . '">';
?>
  <fieldset>
    <legend>Utilisateur :</legend>
<?php
if ($uChamp == 'updated') {
    echo <<< EOT
    <p>
      <label for="idUtilisateur_id">id Utilisateur</label> :
      <input type="text" name="idUtilisateur" value="$uIdUtilisateur" id="idUtilisateur_id" readonly/>
    </p>
EOT;
}
?>
    <p>
      <label for="nomUtilisateur_id">Nom</label> :
      <input type="text" placeholder="Ex : Andrie" name="nomUtilisateur" id="nomUtilisateur_id" required/>
    </p>
    <p>
      <label for="prenomUtilisateur_id">Prénom</label> :
      <input type="text" placeholder="Ex : Alex" name="prenomUtilisateur" id="prenomUtilisateur_id" required/>
    </p>
    <p>
      <label for="mailUtilisateur_id">Courriel</label> :
      <input type="text" placeholder="Ex : canard@and.coin" name="mailUtilisateur" id="mailUtilisateur_id" required/>
    </p>
    <p>
      <label for="ageUtilisateur_id">Age</label> :
      <input type="text" placeholder="Ex : 16" name="ageUtilisateur" id="ageUtilisateur_id" required/>
    </p>
    <p>
      <label for="mdpUtilisateur_id">Mot de passe</label> :
      <input type="password" placeholder="Ex : *******" name="mdpUtilisateur" id="mdpUtilisateur_id" required/>
    </p>
    <p>
      <label for="mdpUtilisateurC_id">Confirmer le mot de passe</label> :
      <input type="password" placeholder="Ex : *******" name="mdpUtilisateurC" id="mdpUtilisateurC_id" required/>
    </p>
    <p>
      <label for="idRole_id">idRole</label> :
      <input type="text" placeholder="Ex : 0" name="idRole" id="idRole_id" required/>
    </p>
    <p>
<?php
echo '<input type="submit" value="' . $uLabel . '" />';
?>
    </p>
  </fieldset>
</form>
