
<?php
foreach($tab as $key => $value){
  $nomUtilisateur = htmlspecialchars($value->get('nomUtilisateur'));
  $idUtilisateurURL = rawurlencode($value->get('idUtilisateur'));
  echo '<p><a href=index.php?controller=utilisateurs&action=read&idUtilisateur=' . $idUtilisateurURL . '>' . $nomUtilisateur . '</a></p>';
}
?>
