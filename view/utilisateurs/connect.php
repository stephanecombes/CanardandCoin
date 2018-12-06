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
      </p>
      <p>
        <input type="text" placeholder="Ex : 5" name="idUtilisateur" id="idUtilisateur_id" required/>
      </p>
      <p>
        <label for="mdpUtilisateur">Mot de passe :</label> :
      </p>
      <p>
        <input type="password" placeholder="Ex : ********" name="mdpUtilisateur" id="mdpUtilisateur_id" required/>
      </p>
      <p>
        <input type="submit" value="Se connecter" />
      </p>
  	</fieldset>
  </form>
  <?php
}
?>
