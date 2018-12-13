<p>La commande à bien été supprimé</p>
<?php
if (Session::is_admin()) {
    echo '<a class="button" href=index.php?controller=commandes&action=readAll>Liste des commandes</a>';
} else if ($value->get('idUtilisateur') === $_SESSION['idUtilisateur']) {
    $idCommande = htmlspecialchars($value->get('idCommande'));
    $idCommandeURL = rawurlencode($value->get('idCommande'));
    echo '<p><a href=index.php?controller=commandes&action=read&idCommande=' . $idCommandeURL . '>' . $idCommande . '</a></p>';

}
?>