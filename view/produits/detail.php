<h1>Détail du produit " <?php echo $p->get('nomProduit') ;?> " </h1>
<?php

require_once File::build_path(array('model', 'ModelProduits.php'));
$idp = '<p>Référence du produit : ' . $p->get('idProduit') . '</p>';
$nomp = '<p>Nom du produit : ' . $p->get('nomProduit') . '</p>';
$idcp = '<p>Catégorie du produit : ' . $p->get('idCategorie') . '</p>';
$coulp = '<p>Couleur du produit : ' . $p->get('couleurProduit') . '</p>';
$descrp = '<p>Description du produit : ' . $p->get('descriptionProduit') . '</p>';
$taillep = '<p>taille du produit : ' . $p->get('tailleProduit') . '</p>';
$poidsp = '<p>Poids du produit : ' . $p->get('poidsProduit') . '</p>';
$agep = '<p>Age du produit : ' . $p->get('ageProduit') . '</p>';

$detailProduit = $idp . $nomp . $idcp . $coulp . $descrp . $taillep . $poidsp . $agep;

$req_sql = 'SELECT * FROM cac_galerieImage gal JOIN cac_images im ON gal.idImage = im.idImage WHERE idProduit = ' . $p->get('idProduit') . ';';
$rep = Model::$PDO->query($req_sql);
$rep->setFetchMode(PDO::FETCH_CLASS, 'ModelImages');
$images = $rep->fetchAll();

if(!$images){
  $imglink = 'images/basic.png';
}else{
  $imglink = $images[0]->get('lienImage');
}

?>
<div class="general_detail_div">
  <div class="img_detail_div">
    <div class="slider">
      <figure>
        <img src="<?php echo $imglink; ?>">
      <?php
      if($images && count($images) > 1){
        foreach ($images as $key => $value) {
          if($value->get('lienImage') != $images[0]->get('lienImage')){
            echo '  <img src="' . $value->get('lienImage') . '">';
          }
        }
      }
       ?>
     </figure>
    </div>
  </div>
  <div class="descr_detail_div">
    <h2>Description : </h2>
    <?php echo $detailProduit; ?>
  </div>
</div>
