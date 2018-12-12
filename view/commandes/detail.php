<div>
  <h1>Détail de la commande :</h1>
<?php
require_once File::build_path(array('model', 'ModelUtilisateurs.php'));
$idc = '<p>ID de la commande : ' . $co->get('idCommande') . '</p>';
$iduc = '<p>ID de l\'utilisateur : ' . $co->get('idUtilisateur') . '</p>';
$datec = '<p>Date de la commande : ' . $co->get('dateCommande') . '</p>';
$idsc = '<p>Id du statut : ' . $co->get('idStatut') . '</p>';
$montantc = '<p>Montant de la commande : ' . $co->get('montantCommande') . '</p>';

$detailcommande = $idc . $iduc . $datec . $idsc . $montantc;
echo '<div>';
echo '<p>' . $detailcommande . '</p>';
echo '</div>';
$values = array('idCommande' => $co->get('idCommande'));

$sql = 'SELECT * FROM cac_lignecommande WHERE idCommande = :idCommande' ;

$sql_prep = Model::$PDO->prepare($sql);
$sql_prep->execute($values);
$sql_prep->setFetchMode(PDO::FETCH_ASSOC);
$tab = $sql_prep->fetchAll();

$array_tab = (array) $tab;

echo '<h2>Produits commandés :</h2>';

echo '<table class="table_panier">';
echo '<tr>';
echo	'<th>N°</th>';
echo	'<th>ID commande</th>';
echo	'<th>ID produit</th>';
echo	'<th>quantité</th>';
echo '</tr>';


foreach ($array_tab as $key => $value) {
  echo '<tr>';
  echo '<td>' . ($key + 1) . '</td>';
  echo '<td>' . $value['idCommande'] . '</td>';
  echo '<td>' . $value['idProduit'] . '</td>';
  echo '<td>' . $value['quantiteProduits'] . '</td>';
  echo '</tr>';
}
echo '</table>';
?>
</div>
