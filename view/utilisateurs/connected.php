<p> Connexion réussie </p>

<?php
session_start();
$_SESSION['idUtilisateur'] = $user->get('idUtilisateur');
?>
