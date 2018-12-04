<h1>Liste des images</h1>

<?php
foreach($tab as $key => $value){
  $idImageURL = rawurlencode($value->get('idImage'));
  echo '<div class="list_img_block">';
  echo '<a href="index.php?controller=images&action=read&idImage=' . $idImageURL . '"><img class="img_list" src="' . $value->get('lienImage') . '" alt="image">';
  echo '</div>';
}


 ?>
