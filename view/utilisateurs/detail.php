
<?php
  require_once File::build_path(array('model', 'ModelUtilisateurs.php'));
  $idu = '<p>ID de l\'utilisateur : ' . $u->get('idUtilisateur') . '</p>';
  $nomu = '<p>Nom de l\'utilisateur : ' . $u->get('nomUtilisateur') . '</p>';
  $prenomu = '<p>Prénom de l\'utilisateur : ' . $u->get('prenomUtilisateur') . '</p>';
  $mailu = '<p>mail de l\'utilisateur : ' . $u->get('mailUtilisateur') . '</p>';
  $ageu = '<p>Age de l\'utilisateur : ' . $u->get('ageUtilisateur') . '</p>';
  $roleu = '<p>Rôle de l\'utilisateur : ' . $u->get('idRole') . '</p>';

  $detailutilisateur = $idu . $nomu . $prenomu . $mailu . $ageu . $roleu;

  echo '<p>' . $detailutilisateur . '</p>';

?>
