<?php
if(Session::is_admin()){
  echo '<table class="table_panier">';
  echo '<tr>';
  echo '<th>ID catégorie</th>';
  echo '<th>nom catégorie</th>';
  echo '</tr>';
  foreach ($tab as $key => $value) {
      $nomCategorie = htmlspecialchars($value->get('nomCategorie'));
      $idCategorieURL = rawurlencode($value->get('idCategorie'));
      echo '<tr>';
      echo '<td>' . $value->get('idCategorie') . '</td>';
      echo '<td><a href=index.php?controller=categories&action=read&idCategorie=' . $idCategorieURL . '>' . $nomCategorie . '</a></td>';
      echo '</tr>';
  }
  echo '</table>';
}else{
  echo '<p>Vous n\'avez pas les droits requis <a href="index.php">Retour à l\'accueil</a></p>';
}
?>
