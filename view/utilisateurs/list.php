<?php
if (Session::is_admin()) {
    echo '<h1>Liste des utilisateurs </h1>';
    echo '<a class="button" href=index.php?controller=utilisateurs&action=create>Ajouter un utilisateur</a>';

    echo '<table class="table_panier">';
    echo '<p>Liste des utilisateurs :</p>';
    echo '<tr>';
    echo	'<th>n°</th>';
    echo	'<th>nom utilisateur</th>';
    echo '</tr>';
    foreach ($tab as $key => $value) {
        $nomUtilisateur = htmlspecialchars($value->get('nomUtilisateur'));
        $idUtilisateurURL = rawurlencode($value->get('idUtilisateur'));
        echo '<tr>';
        echo '<td>' . ($key + 1) . '</td>';
        echo '<td><a href=index.php?controller=utilisateurs&action=read&idUtilisateur=' . $idUtilisateurURL . '>' . $nomUtilisateur . '</a></td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    if (isset($_SESSION['idUtilisateur'])) {
        $idUtilisateurURL = rawurlencode($_SESSION['idUtilisateur']);
        $_GET['idUtilisateur'] = $_SESSION['idUtilisateur'];
        $u = ModelUtilisateurs::select($_SESSION['idUtilisateur']);
        require File::build_path(array('view', 'utilisateurs', 'detail.php'));
    } else {
        echo '<p>Vous n\'avez pas les droits requis</p>';
    }
}
