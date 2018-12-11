<form method="post" action="index.php?controller=produits&action=modifyArticleQuantity">
		<?php
		if (ControllerProduits::createPanier()){
			$nbArticles=count($_SESSION['panier']['idProduit']);
			if ($nbArticles <= 0)
			echo "<p>Votre panier est vide </p>";
			else
			{
				echo '<table class="table_panier">';
				echo '<p>Votre panier :</p>';
				echo '<tr>';
				echo	'<th>Libellé</th>';
				echo	'<th>Quantité</th>';
				echo	'<th>Prix Unitaire</th>';
				echo	'<th>Action</th>';
				echo '</tr>';
				for ($i=0 ;$i < $nbArticles ; $i++)
				{
					$produit = ModelProduits::select($_SESSION['panier']['idProduit'][$i]);
					$nomProduit = $produit->get('nomProduit');
					echo '<tr>';
					echo '<td><a href="index.php?controller=produits&action=read&idProduit=' . $_SESSION['panier']['idProduit'][$i] . '">' . htmlspecialchars($nomProduit) . '</a></ td>';
					echo '<td><input type="text" size="4" name="q[]" value="' .htmlspecialchars($_SESSION['panier']['quantity'][$i]) . '"></td>';
					echo '<td>' . htmlspecialchars($_SESSION['panier']['prix'][$i]) . ' €</td>';
					echo '<td><a href="' . htmlspecialchars('index.php?controller=produits&action=deleteArticle&l=' . rawurlencode($_SESSION['panier']['idProduit'][$i])) . '">Supprimer</a></td>';
					echo '</tr>';
				}

				echo '<tr><td colspan="2"> </td>';
				echo '<td colspan="2">';
				echo '<p>Total : ' . ControllerProduits::totalprice() . ' €</p>';
				echo '</td></tr>';
				echo '</table>';
				echo '<div class="input_panier"><input type="submit" value="Actualiser"/></div>';
			}
		}
	?>
</form>
<a href="index.php?controller=commandes&action=command">Passer commande</a>
