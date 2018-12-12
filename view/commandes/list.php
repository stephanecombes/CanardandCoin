<?php
if(Session::is_admin()){
	echo '<h1>Listes des commandes</h1>';
	foreach ($tab as $key => $value) {
		$idCommande = htmlspecialchars($value->get('idCommande'));
		$idCommandeURL = rawurlencode($value->get('idCommande'));
		echo '<p><a href=index.php?controller=commandes&action=read&idCommande=' . $idCommandeURL . '>' . $idCommande . '</a></p>';
	}
}else{
	echo '<h1>Mes commandes</h1>';
	foreach ($tab as $key => $value) {
		if($value->get('idUtilisateur') === $_SESSION['idUtilisateur']){
			$idCommande = htmlspecialchars($value->get('idCommande'));
			$idCommandeURL = rawurlencode($value->get('idCommande'));
			echo '<p><a href=index.php?controller=commandes&action=read&idCommande=' . $idCommandeURL . '>' . $idCommande . '</a></p>';
		}
	}
}
?>
