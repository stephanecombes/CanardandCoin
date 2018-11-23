<?php
if (isset($_GET['ipProduit'])) {
    echo 'Le produit ' . $_GET['idProduit'] . ' n\'est pas connu';
} else {
    echo 'Action inconnue !';
}
