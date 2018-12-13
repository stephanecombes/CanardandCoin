<?php
if (isset($_GET['idProduit'])) {
    echo 'Le produit ' . $_GET['idProduit'] . ' n\'est pas connu';
	echo '<a class="button" href="index.php?controller=produits&action=readAll">Liste des produits</a>';

} else {
    echo 'Action inconnue !';
}
