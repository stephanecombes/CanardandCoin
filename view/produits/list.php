
<?php
foreach($tab as $key => $value){
  $nomProduit = htmlspecialchars($value->get('nomProduit'));
  echo '<p><a href="">' . '$nomProduit' . '</a></p>';
}
?>
