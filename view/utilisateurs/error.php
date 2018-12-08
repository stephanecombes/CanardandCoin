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
        require File::build_path(array('view', 'utilisateurs', 'update.php'));
        break;
    case 'E_PASSWORD':
        echo '<p>Les deux mots de passe ne sont pas identique</p>';
        require File::build_path(array('view', 'utilisateurs', 'update.php'));
        break;
    case 'E_EMAIL_IN_USE':
        echo '<p>Il y a déja un compte client associé à ce courriel</p>';
        require File::build_path(array('view', 'utilisateurs', 'update.php'));
        break;
    case 'E_CONNECT':
        echo '<p>Courriel ou mot de passe incorrect</p>';
        require File::build_path(array('view', 'utilisateurs', 'connect.php'));
        break;
    case 'E_NONCE':
        echo '<p>Veuillez valider votre courriel avant de vous connecter</p>';
        require File::build_path(array('view', 'utilisateurs', 'connect.php'));
        break;
    case 'E_NONCE_NULL':
        echo '<p>Le courriel est déja validé</p>';
        require File::build_path(array('view', 'utilisateurs', 'connect.php'));
        break;
    case 'E_NONCE_DONT_MATCH':
        echo '<p>La clé de validation ne correcpond pas à celle de cet utilisateur</p>';
        require File::build_path(array('view', 'utilisateurs', 'connect.php'));
        break;
}
