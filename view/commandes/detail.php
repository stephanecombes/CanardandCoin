<?php
require_once File::build_path(array('model', 'ModelUtilisateurs.php'));
$idc = '<p>ID de la commande : ' . $c->get('idCommande') . '</p>';
$iduc = '<p>ID de l\'utilisateur : ' . $c->get('idUtilisateur') . '</p>';
$datec = '<p>Date de la commande : ' . $c->get('dateCommande') . '</p>';
$idsc = '<p>Id du statut : ' . $c->get('idStatut') . '</p>';
$montantc = '<p>Montant de la commande : ' . $c->get('montantCommande') . '</p>';
$idadrlivc = '<p>ID de l\'adresse de livraison : ' . $c->get('idAdresseLivraison') . '</p>';
$idadrfacc = '<p>ID de l\'adresse de livraison : ' . $c->get('idAdresseFacturation') . '</p>';

$detailcommande = $idc . $iduc . $datec . $idsc . $montantc . $idadrlivc . $idadrfacc;

echo '<p>' . $detailcommande . '</p>';
