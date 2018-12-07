<?php
?>
<h1> Panier </h1>
<?php
if(isset($_SESSION['listProduit'])){
  foreach ($_SESSION['listProduit'] as $key => $value) {
    
    $produit = ModelProduits::select($value);

    $idProduitURL = rawurlencode($value);

    echo '<p><a href=index.php?controller=produits&action=read&idProduit=' . $idProduitURL . '>Produit : ' . $produit->get('nomProduit') . ' </a></p>';
  }
}else{
?>
<P>Pas de produits dans le panier</p>
<?php
}
?>
