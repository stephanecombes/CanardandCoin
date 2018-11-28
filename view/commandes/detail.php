<?php
require_once File::build_path(array('model', 'ModelUtilisateurs.php'));
$idc = '<p>ID de la commande : ' . $c->get('idUtilisateur') . '</p>';
$iduc = '<p>Nom de l\'utilisateur : ' . $c->get('nomUtilisateur') . '</p>';
$datec = '<p>Prénom de l\'utilisateur : ' . $c->get('prenomUtilisateur') . '</p>';
$idsc = '<p>mail de l\'utilisateur : ' . $c->get('mailUtilisateur') . '</p>';
$montantc = '<p>Age de l\'utilisateur : ' . $c->get('ageUtilisateur') . '</p>';
$idadrlivc = '<p>Rôle de l\'utilisateur : ' . $c->get('idRole') . '</p>';
$idadrfacc = '<p>Rôle de l\'utilisateur : ' . $c->get('idRole') . '</p>';

$detailutilisateur = $idu . $nomu . $prenomu . $mailu . $ageu . $roleu;

echo '<p>' . $detailutilisateur . '</p>';
