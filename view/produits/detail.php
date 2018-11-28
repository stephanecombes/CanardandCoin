<?php
require_once File::build_path(array('model', 'ModelProduits.php'));
$idp = '<p>ID du produit : ' . $p->get('idProduit') . '</p>';
$nomp = '<p>Nom du produit : ' . $p->get('nomProduit') . '</p>';
$idcp = '<p>Catégorie du produit : ' . $p->get('idCategorie') . '</p>';
$coulp = '<p>Couleur du produit : ' . $p->get('couleurProduit') . '</p>';
$descrp = '<p>Description du produit : ' . $p->get('descriptionProduit') . '</p>';
$taillep = '<p>taille du produit : ' . $p->get('tailleProduit') . '</p>';
$poidsp = '<p>Poids du produit : ' . $p->get('poidsProduit') . '</p>';
$agep = '<p>Age du produit : ' . $p->get('ageProduit') . '</p>';

$detailProduit = $idp . $nomp . $idcp . $coulp . $descrp . $taillep . $poidsp . $agep;

echo '<p>' . $detailProduit . '</p>';

echo "<p><a href=''>Ajouter au panier</a></p>"
?>
