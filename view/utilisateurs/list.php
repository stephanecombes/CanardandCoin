<?php
if(Session::is_admin()){
	echo '<h1>Liste des utilisateurs </h1>';
	echo '<p><a href=index.php?controller=utilisateurs&action=create>Ajouter un utilisateur</a></p>';        

	foreach ($tab as $key => $value) {
    	$nomUtilisateur = htmlspecialchars($value->get('nomUtilisateur'));
    	$idUtilisateurURL = rawurlencode($value->get('idUtilisateur'));
    	echo '<p><a href=index.php?controller=utilisateurs&action=read&idUtilisateur=' . $idUtilisateurURL . '>' . $nomUtilisateur . '</a></p>';
	}
} else{
	echo '<h1>Mon profil </h1>';
	if(Session::is_user($_POST['idUtilisateur'])){
		foreach ($tab as $key => $value) {
    		$nomUtilisateur = htmlspecialchars($value->get('nomUtilisateur'));
    		$idUtilisateurURL = rawurlencode($value->get('idUtilisateur'));
    		echo '<p><a href=index.php?controller=utilisateurs&action=read&idUtilisateur=' . $idUtilisateurURL . '>' . $nomUtilisateur . '</a></p>';
		}
	}else{
		echo '<p>Vous n\'avez pas les droits requis</p>';
	}

}
?>