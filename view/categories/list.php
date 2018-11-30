<?php
foreach ($tab as $key => $value) {
    $nomCategorie = htmlspecialchars($value->get('nomCategorie'));
    $idCategorieURL = htmlrawurlencore($value->get('idCategorie'));
    echo '<p><a href=index.php?controller=categorie&action=read&idCategorie=' . $idCategorieURL . '>' . $nomCategorie . '</a></p>';
}
