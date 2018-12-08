<?php
require_once File::build_path(array('model', 'ModelUtilisateurs.php'));
$idu = '<p>ID de l\'utilisateur : ' . $u->get('idUtilisateur') . '</p>';
$nomu = '<p>Nom de l\'utilisateur : ' . $u->get('nomUtilisateur') . '</p>';
$prenomu = '<p>Prénom de l\'utilisateur : ' . $u->get('prenomUtilisateur') . '</p>';
$mailu = '<p>mail de l\'utilisateur : ' . $u->get('mailUtilisateur') . '</p>';
$ageu = '<p>Age de l\'utilisateur : ' . $u->get('ageUtilisateur') . '</p>';
$roleu = '<p>Rôle de l\'utilisateur : ' . $u->get('idRole') . '</p>';

$detailutilisateur = $idu . $nomu . $prenomu . $mailu . $ageu . $roleu;

if(Session::is_admin()){
	echo '<h1>Détail de l\'utilisateur </h1>';
	echo '<p>' . $detailutilisateur . '</p>';
	echo '<p><a href=index.php?controller=utilisateurs&action=update&idUtilisateur=' . $idUtilisateurURL . '>Modifier</a></p>';
	echo '<p><a href=index.php?controller=utilisateurs&action=delete&idUtilisateur=' . $idUtilisateurURL . '>Supprimer</a></p>';
} else if (isset($_SESSION['idUtilisateur'])) {
	echo '<h1>Mon profil </h1>';
	echo '<p><a href=index.php?controller=utilisateurs&action=update&idUtilisateur=' . $idUtilisateurURL . '>Modifier</a></p>';
	echo '<p>' . $detailutilisateur . '</p>';
}else{
	echo 'Vous n\'avez pas les droits requis';
}

