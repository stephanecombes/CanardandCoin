<h1>Nos produits </h1>
<?php

foreach ($tab as $key => $value) {
  $req_sql = 'SELECT * FROM cac_galerieImage gal JOIN cac_images im ON gal.idImage = im.idImage WHERE idProduit = ' . $value->get('idProduit') . ';';
  $rep = Model::$PDO->query($req_sql);
  $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelImages');
  $images = $rep->fetchAll();
  $nomProduit = htmlspecialchars($value->get('nomProduit'));
  $idProduitURL = rawurlencode($value->get('idProduit'));
  if(!$images){
    $imglink = 'images/basic.png';
  }else{
    $imglink = $images[0]->get('lienImage');
  }
  echo '<a class="list_block" href=index.php?controller=produits&action=read&idProduit=' . $idProduitURL . '>';
  echo '<img class="img_produit" src="' . $imglink . '">';
  echo '<p>' . $nomProduit . '</p>';
  echo '</a>';
}