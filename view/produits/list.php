
<?php
foreach($tab as $key => $value){
  $nomProduit = htmlspecialchars($value->get('nomProduit'));
  $idProduitURL = rawurlencode($value->get('idProduit'));
  echo '<p><a href=index.php?controller=produits&action=read&idProduit=' . $idProduitURL . '>' . $nomProduit . '</a></p>';
}
?>
