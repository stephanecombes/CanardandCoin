<?php
require_once File::build_path(array('model', 'ModelUtilisateurs.php'));
require_once File::build_path(array('lib', 'Security.php'));

class ControllerUtilisateurs
{
    protected static $object = 'utilisateurs';

    public static function readAll()
    {
        $pagetitle = 'Liste des utilisateurs';
        $tab = ModelUtilisateurs::selectAll();
        $view = 'list';
        require_once File::build_path(array('view', 'view.php'));
    }

    public static function read()
    {
        $u = ModelUtilisateurs::select($_GET['idUtilisateur']);
        if ($u != false) {
            $pagetitle = 'Détail de l\'utilisateur';
            $view = 'detail';
            require File::build_path(array("view", "view.php"));
        } else {
            $idUtilisateur = $_GET['idUtilisateur'];
            $pagetitle = 'Erreur d\'utilisateur';
            $type = 'E_USER';
            $view = 'error';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function delete()
    {
        $u = ModelUtilisateurs::select($_GET['idUtilisateur']);
        if ($u != false && (Session::is_user($u->get('idUtilisateur')) || Session::is_admin())) {
            $id = $_GET['idUtilisateur'];
            $pagetitle = 'Suppression d\'utilisateur';
            $view = 'deleted';
            ModelUtilisateurs::delete($id);
            $tab_u = ModelUtilisateurs::selectAll();
            require_once File::build_path(array('view', 'view.php'));
        } else if (!$u) {
            $idUtilisateur = $_GET['idUtilisateur'];
            $pagetitle = 'Erreur d\'utilisateur';
            $type = 'E_USER';
            $view = 'error';
            require File::build_path(array("view", "view.php"));
        } else {
            $pagetitle = 'Erreur';
            $type = 'E_ACCESS';
            $view = 'error';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function create()
    {
        $pagetitle = 'Création d\'un utilisateur';
        $view = 'update';
        require File::build_path(array("view", "view.php"));
    }

    public static function created()
    {
        if (!filter_var($_POST['mailUtilisateur'], FILTER_VALIDATE_EMAIL)) {
            $lastForm = $_POST;
            $pagetitle = 'Erreur courriel incorrect';
            $type = 'E_EMAIL';
            $view = 'error';
            require File::build_path(array("view", "view.php"));
        } else if ($_POST['mdpUtilisateur'] != $_POST['mdpUtilisateurC']) {
            $lastForm = $_POST;
            $pagetitle = 'Erreur mots de passe ne correspondent pas';
            $type = 'E_PASSWORD';
            $view = 'error';
            require File::build_path(array("view", "view.php"));
        } else if (!ModelUtilisateurs::checkEmail($_POST['mailUtilisateur'])) {
            $lastForm = $_POST;
            $pagetitle = 'Courriel déja utilisé';
            $type = 'E_EMAIL_IN_USE';
            $view = 'error';
            require File::build_path(array("view", "view.php"));
        } else {
            $_POST['mdpUtilisateur'] = Security::chiffrer($_POST['mdpUtilisateur']);
            if (!isset($_POST['idRole'])) {
                $_POST['idRole'] = 1;
            }
            $utilisateur = new ModelUtilisateurs($_POST);
            $utilisateur->save();
            $pagetitle = 'Liste des utilisateurs';
            $tab = ModelUtilisateurs::selectAll();
            $view = 'created';
            require_once File::build_path(array('view', 'view.php'));
        }
    }

    public static function update()
    {
        $u = ModelUtilisateurs::select($_GET['idUtilisateur']);
        if ($u != false && (Session::is_user($u->get('idUtilisateur'))) || Session::is_admin()) {
            $pagetitle = 'Modification d\'un utilisateur';
            $view = 'update';
            require_once File::build_path(array('view', 'view.php'));
        } else if (!$u) {
            $idUtilisateur = $_GET['idUtilisateur'];
            $pagetitle = 'Erreur d\'utilisateur';
            $type = 'E_USER';
            $view = 'error';
            require File::build_path(array("view", "view.php"));
        } else {
            $pagetitle = 'Erreur';
            $type = 'E_ACCESS';
            $view = 'error';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function updated()
    {
        $up = true;
        $u = ModelUtilisateurs::select($_POST['idUtilisateur']);
        if (!filter_var($_POST['mailUtilisateur'], FILTER_VALIDATE_EMAIL)) {
            $lastForm = $_POST;
            $pagetitle = 'Erreur courriel incorrect';
            $type = 'E_EMAIL';
            $view = 'error';
            require File::build_path(array("view", "view.php"));
        } else if (!$u) {
            $idUtilisateur = $_POST['idUtilisateur'];
            $pagetitle = 'Erreur d\'utilisateur';
            $type = 'E_USER';
            $view = 'error';
            require File::build_path(array("view", "view.php"));
        } else if ($_POST['mdpUtilisateur'] != $_POST['mdpUtilisateurC']) {
            $lastForm = $_POST;
            $pagetitle = 'Erreur mots de passe ne correspondent pas';
            $type = 'E_PASSWORD';
            $view = 'error';
            require File::build_path(array("view", "view.php"));
        } else if (ModelUtilisateurs::checkEmail($_POST['mailUtilisateur']) && (ModelUtilisateurs::getIdbyEmail($_POST['mailUtilisateur'])) != $_SESSION['idUtilisateur']) {
            $lastForm = $_POST;
            $pagetitle = 'Courriel déja utilisé';
            $type = 'E_EMAIL_IN_USE';
            $view = 'error';
            require File::build_path(array("view", "view.php"));
        } else if ($u != false && (Session::is_user($u->get('idUtilisateur')) || Session::is_admin())) {
            $login = $_POST['idUtilisateur'];
            $pagetitle = 'Liste des utilisateurs';
            $tab_u = ModelUtilisateurs::selectAll();
            $view = 'updated';
            $data = array(
                'idUtilisateur' => $_POST['idUtilisateur'],
                'nomUtilisateur' => $_POST['nomUtilisateur'],
                'prenomUtilisateur' => $_POST['prenomUtilisateur'],
                'mdpUtilisateur' => Security::chiffrer($_POST['mdpUtilisateur']),
                'mailUtilisateur' => $_POST['mailUtilisateur'],
                'ageUtilisateur' => $_POST['ageUtilisateur'],
                'idRole' => $_POST['idRole'],
            );
            $_SESSION['idRole'] = $_POST['idRole'];
            ModelUtilisateurs::update($data);
            require_once File::build_path(array('view', 'view.php'));
        } else {
            $pagetitle = 'Erreur';
            $type = 'E_ACCESS';
            $view = 'error';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function connect()
    {
        $pagetitle = 'Connexion';
        $view = 'connect';
        require File::build_path(array("view", "view.php"));
    }

    public static function connected()
    {
        $idUser = ModelUtilisateurs::getIdbyEmail($_POST['mailUtilisateur']);
        $mot_de_passe_chiffre = Security::chiffrer($_POST['mdpUtilisateur']);
        $test = ModelUtilisateurs::checkPassword($idUser, $mot_de_passe_chiffre);
        if ($test) {
            $view = 'detail';
            $u = ModelUtilisateurs::select($idUser);
            $_SESSION['idUtilisateur'] = $u->get('idUtilisateur');
            $_SESSION['idRole'] = $u->get('idRole');
            require_once File::build_path(array('view', 'view.php'));
        } else {
            $view = 'failConnect';
            require_once File::build_path(array('view', 'view.php'));
        }
    }

    public static function disconnected()
    {
        session_unset();
        $pagetitle = 'Déconnecté';
        $view = 'disconnected';
        require File::build_path(array("view", "view.php"));
    }
}
