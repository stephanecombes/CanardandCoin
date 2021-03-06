<?php
require_once File::build_path(array('model', 'ModelUtilisateurs.php'));
$idu = '<p>ID de l\'utilisateur : ' . $u->get('idUtilisateur') . '</p>';
$nomu = '<p>Nom de l\'utilisateur : ' . $u->get('nomUtilisateur') . '</p>';
$prenomu = '<p>Prénom de l\'utilisateur : ' . $u->get('prenomUtilisateur') . '</p>';
$mailu = '<p>Mail de l\'utilisateur : ' . $u->get('mailUtilisateur') . '</p>';
$adresseu = '<p>Adresse de l\'utilisateur : ' . $u->get('ligne1AddresseUtilisateur');

if (!empty($u->get('ligne2AddresseUtilisateur'))) {
    $adresseu = $adresseu . ', ' . $u->get('ligne2AddresseUtilisateur');
}
if (!empty($u->get('ligne3AddresseUtilisateur'))) {
    $adresseu = $adresseu . ', ' . $u->get('ligne3AddresseUtilisateur') . '</p>';

}

$cpu = '<p>Code postal de l\'utilisateur : ' . $u->get('cpUtilisateur') . '</p>';
$villeu = '<p>Ville de l\'utilisateur : ' . $u->get('villeUtilisateur') . '</p>';
$ageu = '<p>Age de l\'utilisateur : ' . $u->get('ageUtilisateur') . '</p>';
$roleu = '<p>Rôle de l\'utilisateur : ' . $u->get('idRole') . '</p>';

$detailutilisateur = $idu . $nomu . $prenomu . $mailu . $adresseu . $cpu . $villeu . $ageu . $roleu;
$idUtilisateurURL = rawurlencode($u->get('idUtilisateur'));

if (Session::is_admin()) {
    echo '<h1>Détail de l\'utilisateur </h1>';
    echo '<p>' . $detailutilisateur . '</p>';
    echo '<a class="button" href=index.php?controller=utilisateurs&action=update&idUtilisateur=' . $idUtilisateurURL . '>Modifier</a>';
    echo '<a class="button" href=index.php?controller=utilisateurs&action=delete&idUtilisateur=' . $idUtilisateurURL . '>Supprimer</a>';
} else if (isset($_SESSION['idUtilisateur'])) {
    echo '<h1>Mon profil </h1>';
    echo '<a class="button" href=index.php?controller=utilisateurs&action=update&idUtilisateur=' . $idUtilisateurURL . '>Modifier</a>';
    echo '<p>' . $detailutilisateur . '</p>';
} else {
    echo 'Vous n\'avez pas les droits requis';
}
