<?php
if(isset($_SESSION['listProduit'])){
  foreach ($_SESSION['listProduit'] as $key => $value) {
    $idProduitURL = rawurlencode($value);
    echo '<a href=index.php?controller=produits&action=read&idProduit=' . $idProduitURL . '>';
  }
}else{
?>
<?php


}
?>
