<?php
switch ($type) {
    case 'E_USER':
        echo '<p>Le client N° ' . $idUtilisateur . ' n\'existe pas</p>';
        // TODO
        break;
    case 'E_ACCESS':
        echo '<p>Vous n\'avez pas le droit de faire cette action</p>';
        require File::build_path(array('view', 'utilisateurs', 'connect.php'));
        break;
    case 'E_EMAIL':
        echo '<p>Le courriel ' . $lastForm['mailUtilisateur'] . ' est incorrect</p>';
        $view = 'update';
        require File::build_path(array('view', 'utilisateurs', 'update.php'));
        break;
    case 'E_PASSWORD':
        echo '<p>Les deux mots de passe ne sont pas identique</p>';
        $view = 'update';
        require File::build_path(array('view', 'utilisateurs', 'update.php'));
        break;
    case 'E_EMAIL_IN_USE':
        echo '<p>Il y a déja un compte client associé à ce courriel</p>';
        $view = 'update';
        require File::build_path(array('view', 'utilisateurs', 'update.php'));
        break;
}
