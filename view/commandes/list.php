<?php
echo '<table class="table_panier">';
echo '<tr>';
echo	'<th>N°</th>';
echo	'<th>ID commande</th>';
echo	'<th>ID utilisateur</th>';
echo	'<th>date commande</th>';
echo	'<th>statut</th>';
echo	'<th>montant</th>';
echo '</tr>';
if(Session::is_admin()){
	echo '<h1>Listes des commandes</h1>';
	foreach ($tab as $key => $value) {
		$idCommandeURL = rawurlencode($value->get('idCommande'));
		echo '<tr>';
		echo	'<td>' . ($key + 1 ) . '</td>';
		echo	'<td><a href=index.php?controller=commandes&action=read&idCommande=' . $idCommandeURL . '>' . $value->get('idCommande') . '</a></td>';
		echo	'<td>' . $value->get('idUtilisateur') . '</td>';
		echo	'<td>' . $value->get('dateCommande') . '</td>';
		echo	'<td><a href="index.php?controller=commandes&action=changeStatut&idCommande=' . $idCommandeURL . '">' . ControllerCommandes::statusName($value->get('idCommande')) . '</td></a>';
		echo	'<td>' . $value->get('montantCommande') . '</td>';
		echo '</tr>';
	}
}else{
	echo '<h1>Mes commandes</h1>';
	foreach ($tab as $key => $value) {
		if($value->get('idUtilisateur') === $_SESSION['idUtilisateur']){
			$idCommande = htmlspecialchars($value->get('idCommande'));
			$idCommandeURL = rawurlencode($value->get('idCommande'));
				echo '<tr>';
				echo	'<td>' . ($key + 1 ) . '</td>';
				echo	'<td><a href=index.php?controller=commandes&action=read&idCommande=' . $idCommandeURL . '>' . $value->get('idCommande') . '</a></td>';
				echo	'<td>' . $value->get('idUtilisateur') . '</td>';
				echo	'<td>' . $value->get('dateCommande') . '</td>';
				echo	'<td>' . ControllerCommandes::statusName($value->get('idCommande')) . '</td>';
				echo	'<td>' . $value->get('montantCommande') . '</td>';
				echo '</tr>';
	}
}
}
echo '</table>';
?>
