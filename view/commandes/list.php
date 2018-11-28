
<?php
foreach($tab as $key => $value){
  $idCommande = htmlspecialchars($value->get('idCommande'));
  $idCommandeURL = rawurlencode($value->get('idCommande'));
  echo '<p><a href=index.php?controller=commandes&action=read&idCommande=' . $idCommandeURL . '>' . $idCommande . '</a></p>';
}
?>
