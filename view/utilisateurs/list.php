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
	if(isset($_SESSION['idUtilisateur'])){
		echo '<h1>Mon profil </h1>';
		$idUtilisateurURL = rawurlencode($_SESSION['idUtilisateur']);
		echo '<p><a href=index.php?controller=utilisateurs&action=update&idUtilisateur=' . $idUtilisateurURL .'>Modifier mes informations</a></p>';        
		$_GET['idUtilisateur'] = $_SESSION['idUtilisateur'];
		$u = ModelUtilisateurs::select($_SESSION['idUtilisateur']);
	    require File::build_path(array('view', 'utilisateurs', 'detail.php'));
	} else {
		echo '<p>Vous n\'avez pas les droits requis</p>';
	}
    
}
?>