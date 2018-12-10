<h1>Détail du produit " <?php echo $p->get('nomProduit') ;?> " </h1>
<?php
$idProduitURL = rawurlencode($p->get('idProduit'));
require_once File::build_path(array('model', 'ModelProduits.php'));
$idp = '<p>Référence du produit : ' . $p->get('idProduit') . '</p>';
$nomp = '<p>Nom du produit : ' . $p->get('nomProduit') . '</p>';
$idcp = '<p>Catégorie du produit : ' . $p->get('idCategorie') . '</p>';
$coulp = '<p>Couleur du produit : ' . $p->get('couleurProduit') . '</p>';
$descrp = '<p>Description du produit : ' . $p->get('descriptionProduit') . '</p>';
$prixp = '<p>Prix du produit : ' . $p->get('prixProduit') . ' €</p>';
$taillep = '<p>Taille du produit : ' . $p->get('tailleProduit') . ' m</p>';
$poidsp = '<p>Poids du produit : ' . $p->get('poidsProduit') . ' kg</p>';
$agep = '<p>Age du produit : ' . $p->get('ageProduit') . ' ans</p>';

$detailProduit = $idp . $nomp . $idcp . $coulp . $descrp . $prixp . $taillep . $poidsp . $agep;

$req_sql = 'SELECT * FROM cac_galerieimage gal JOIN cac_images im ON gal.idImage = im.idImage WHERE idProduit = ' . $p->get('idProduit') . ';';
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
    <div id="resize" mywidth="120" myheight="120" class="slider">
      <div class="mySlides fade">
        <img src="<?php echo $imglink; ?>">
      </div>

      <?php
      if($images && count($images) > 1){
        foreach ($images as $key => $value) {
          if($value->get('lienImage') != $images[0]->get('lienImage')){
            echo '<div class="mySlides fade">';
            echo '<img src="' . $value->get('lienImage') . '">';
            echo '</div>';
          }
        }
      }

       if($images && count($images) > 1){
         echo '<a class="prev" onclick="plusSlides(-1)">&#10094;</a>';
         echo '<a class="next" onclick="plusSlides(1)">&#10095;</a>';
         echo '<div class="dot_class">';

         $number = 1;
         foreach ($images as $key => $value) {
           echo '<span class="dot" onclick="currentSlide(' . $number . ')"></span>';
           $number = $number + 1;
         }
         echo '</div>';
       }
      ?>

    </div>
  </div>
  <div class="descr_detail_div">
    <h2>Description : </h2>
    <?php
    echo $detailProduit;
	if(Session::is_admin()){
		echo '<p><a href=index.php?controller=produits&action=update&idProduit=' . $idProduitURL . '>Modifier</a></p>';
		echo '<p><a href=index.php?controller=produits&action=delete&idProduit=' . $idProduitURL . '>Supprimer</a></p>';
	} else {
		echo '<p><a href=index.php?controller=produits&action=toPanier&idProduit=' . $idProduitURL . '>Ajouter au panier</a></p>';
	}
    ?>
  </div>
</div>
<script>
showSlides(1);
Resize();
</script>
