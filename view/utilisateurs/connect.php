<?php
if (isset($_SESSION['idUtilisateur'])) {
    echo 'déjà connecté';
} else {
    ?>
  <form name="connexion" id="connexion" method="post" action="index.php?controller=utilisateurs&action=connected">
  	<fieldset>
      <legend>Se connecter : </legend>
      <p>
        <label for="idUtilisateur">ID utilisateur</label> :
        <input type="text" placeholder="Ex : 5" name="idUtilisateur" id="idUtilisateur_id" required/>
      </p>
      <p>
        <label for="motDePasse">Mot de passe :</label> :
        <input type="text" placeholder="Ex : ********" name="motDePasse" id="motDePasse_id" required/>
      </p>
      <p>
        <input type="submit" value="Se connecter" />
      </p>
  	</fieldset>
  </form>
  <?php
}
?>
