<h1>Nos produits </h1>
<?php
foreach ($tab as $key => $value) {
    $nomProduit = htmlspecialchars($value->get('nomProduit'));
    $idProduitURL = rawurlencode($value->get('idProduit'));
    echo '<a class="list_block" href=index.php?controller=produits&action=read&idProduit=' . $idProduitURL . '>';
    echo '<img class="img_produit" src="images/basic.png">';
    echo '<p>' . $nomProduit . '</p>';
    echo '</a>';
}
