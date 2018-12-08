<?php
if (isset($_GET['idUtilisateur'])) {
    $u = ModelUtilisateurs::select($_GET['idUtilisateur']);
} else {
    $u = false;
}

if ($u != false) {
    $uChamp = 'updated';
    $uLabel = 'Mettre à jour';
    $uIdUtilisateur = htmlspecialchars($u->get('idUtilisateur'));
    $uNomUtilisateur = htmlspecialchars($u->get('nomUtilisateur'));
    $uPrenomUtilisateur = htmlspecialchars($u->get('prenomUtilisateur'));
    $uAgeUtilisateur = htmlspecialchars($u->get('ageUtilisateur'));
    $uMailUtilisateur = htmlspecialchars($u->get('mailUtilisateur'));
    $uIdRole = htmlspecialchars($u->get('idRole'));
    $uLigne1AddresseUtilisateur = htmlspecialchars($u->get('ligne1AddresseUtilisateur'));
    $uLigne2AddresseUtilisateur = htmlspecialchars($u->get('ligne2AddresseUtilisateur'));
    $uLigne3AddresseUtilisateur = htmlspecialchars($u->get('ligne3AddresseUtilisateur'));
    $uCpUtilisateur = htmlspecialchars($u->get('cpUtilisateur'));
    $uVilleUtilisateur = htmlspecialchars($u->get('villeUtilisateur'));
} else if (isset($lastForm) && !isset($up)) {
    $uChamp = 'created';
    $uLabel = 'Créer';
    $uIdUtilisateur = '';
    $uNomUtilisateur = htmlspecialchars($lastForm['nomUtilisateur']);
    $uPrenomUtilisateur = htmlspecialchars($lastForm['prenomUtilisateur']);
    $uAgeUtilisateur = htmlspecialchars($lastForm['ageUtilisateur']);
    $uMailUtilisateur = htmlspecialchars($lastForm['mailUtilisateur']);
    $uIdRole = '';
    $uLigne1AddresseUtilisateur = htmlspecialchars($lastForm['ligne1AddresseUtilisateur']);
    $uLigne2AddresseUtilisateur = htmlspecialchars($lastForm['ligne2AddresseUtilisateur']);
    $uLigne3AddresseUtilisateur = htmlspecialchars($lastForm['ligne3AddresseUtilisateur']);
    $uCpUtilisateur = htmlspecialchars($lastForm['cpUtilisateur']);
    $uVilleUtilisateur = htmlspecialchars($lastForm['villeUtilisateur']);
} else if (isset($lastForm) && isset($up)) {
    $uChamp = 'updated';
    $uLabel = 'Mettre à jour';
    $uIdUtilisateur = htmlspecialchars($lastForm['idUtilisateur']);
    $uNomUtilisateur = htmlspecialchars($lastForm['nomUtilisateur']);
    $uPrenomUtilisateur = htmlspecialchars($lastForm['prenomUtilisateur']);
    $uAgeUtilisateur = htmlspecialchars($lastForm['ageUtilisateur']);
    $uMailUtilisateur = htmlspecialchars($lastForm['mailUtilisateur']);
    $uIdRole = htmlspecialchars($lastForm['idRole']);
    $uLigne1AddresseUtilisateur = htmlspecialchars($lastForm['ligne1AddresseUtilisateur']);
    $uLigne2AddresseUtilisateur = htmlspecialchars($lastForm['ligne2AddresseUtilisateur']);
    $uLigne3AddresseUtilisateur = htmlspecialchars($lastForm['ligne3AddresseUtilisateur']);
    $uCpUtilisateur = htmlspecialchars($lastForm['cpUtilisateur']);
    $uVilleUtilisateur = htmlspecialchars($lastForm['villeUtilisateur']);
} else {
    $uChamp = 'created';
    $uLabel = 'Créer';
    $uIdUtilisateur = '';
    $uNomUtilisateur = '';
    $uPrenomUtilisateur = '';
    $uAgeUtilisateur = '';
    $uMailUtilisateur = '';
    $uIdRole = '';
    $uLigne1AddresseUtilisateur = '';
    $uLigne2AddresseUtilisateur = '';
    $uLigne3AddresseUtilisateur = '';
    $uCpUtilisateur = '';
    $uVilleUtilisateur = '';
}

echo '<form method="post" action="index.php?controller=utilisateurs&action=' . $uChamp . '">';
?>
  <fieldset>
    <legend>Utilisateur :</legend>
<?php
if ($uChamp == 'updated') {
    echo <<< EOT
    <p>
      <label for="idUtilisateur_id">Numéro client</label> :
    </p>
    <p>
      <input type="number" name="idUtilisateur" value="$uIdUtilisateur" id="idUtilisateur_id" readonly/>
    </p>
EOT;
}
?>
    <p>
      <label for="nomUtilisateur_id">Nom</label> :
    </p>
    <p>
<?php
echo '<input type="text" placeholder="Ex : Andrie" name="nomUtilisateur" value="' . $uNomUtilisateur . '" id="nomUtilisateur_id" required/>';
?>
    </p>
    <p>
      <label for="prenomUtilisateur_id">Prénom</label> :
    </p>
    <p>
<?php
echo '<input type="text" placeholder="Ex : Alex" name="prenomUtilisateur" value ="' . $uPrenomUtilisateur . '" id="prenomUtilisateur_id" required/>';
?>
    </p>
    <p>
      <label for="mailUtilisateur_id">Courriel</label> :
    </p>
    <p>
<?php
echo '<input type="email" placeholder="Ex : canard@and.coin" name="mailUtilisateur" value ="' . $uMailUtilisateur . '" id="mailUtilisateur_id" required/>';
?>
    </p>
    <p>
      <label for="ligne1AddresseUtilisateur_id">Ligne adresse 1</label> :
    </p>
    <p>
<?php
echo '<input type="text" placeholder="Ex : 99 rue d\'Occitanie" name="ligne1AddresseUtilisateur" value ="' . $uLigne1AddresseUtilisateur . '" id="ligne1AddresseUtilisateur_id" required/>';
?>
    </p>
    <p>
      <label for="ligne2AddresseUtilisateur_id">Ligne adresse 2</label> :
    </p>
    <p>
<?php
echo '<input type="text" placeholder="Ex : Campus IUT" name="ligne2AddresseUtilisateur" value ="' . $uLigne2AddresseUtilisateur . '" id="ligne2AddresseUtilisateur_id"/>';
?>
    </p>
    <p>
      <label for="ligne3AddresseUtilisateur_id">Ligne adresse 3</label> :
    </p>
    <p>
<?php
echo '<input type="text" placeholder="Ex : Bureau 116" name="ligne3AddresseUtilisateur" value ="' . $uLigne3AddresseUtilisateur . '" id="ligne3AddresseUtilisateur_id"/>';
?>
    </p>
    <p>
      <label for="cpUtilisateur_id">Code postal</label> :
    </p>
    <p>
<?php
echo '<input type="text" placeholder="Ex : 34090" name="cpUtilisateur" value ="' . $uCpUtilisateur . '" id="cpUtilisateur_id" required/>';
?>
    </p>
    <p>
      <label for="villeUtilisateur_id">Ville</label> :
    </p>
    <p>
<?php
echo '<input type="text" placeholder="Ex : Montpellier" name="villeUtilisateur" value ="' . $uVilleUtilisateur . '" id="villeUtilisateur_id" required/>';
?>
    </p>
    <p>
      <label for="ageUtilisateur_id">Age</label> :
    </p>
    <p>
<?php
echo '<input type="number" placeholder="Ex : 16" name="ageUtilisateur" value ="' . $uAgeUtilisateur . '" id="ageUtilisateur_id" required/>';
?>
    </p>
    <p>
      <label for="mdpUtilisateur_id">Mot de passe</label> :
    </p>
    <p>
      <input type="password" placeholder="Ex : *******" name="mdpUtilisateur" id="mdpUtilisateur_id" required/>
    </p>
    <p>
      <label for="mdpUtilisateurC_id">Confirmer le mot de passe</label> :
    </p>
    <p>
      <input type="password" placeholder="Ex : *******" name="mdpUtilisateurC" id="mdpUtilisateurC_id" required/>
    </p>
<?php
if (Session::is_admin()) {
    echo <<< EOT
    <p>
      <label for="idRole_id">Role </label> :
    </p>
    <p>
      <select name="idRole">
EOT;
    try {
        $rep = Model::$PDO->query('SELECT * FROM ' . Conf::getPrefix() . 'roles');
        $tab_role = $rep->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        if (Conf::getDebug()) {
            echo $e->getMessage(); // affiche un message d'erreur
        } else {
            echo 'Une erreur est survenue <a href="index.php"> retour a la page d\'accueil </a>';
        }
    }
    foreach ($tab_role as $value) {
        if ($value->idRole == $uIdRole) {
            $opt = 'selected';
        } else {
            $opt = '';
        }
        echo '<option value="' . $value->idRole . '"' . $opt . '>' . htmlspecialchars($value->nomRole) . '</option>';
    }
}
echo <<< EOT
      </select>
    </p>
EOT;
?>
    <p>
<?php
echo '<input type="submit" value="' . $uLabel . '" />';
?>
    </p>
  </fieldset>
</form>
