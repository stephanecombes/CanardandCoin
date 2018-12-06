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
        $pagetitle = 'Détail de l\'utilisateur';
        $u = ModelUtilisateurs::select($_GET['idUtilisateur']);
        if ($u != false) {
            $view = 'detail';
            require File::build_path(array("view", "view.php"));
        } else {
            $view = 'error';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function delete()
    {
        $u = ModelUtilisateurs::select($_GET['idUtilisateur']);
        if ((isset($u) && Session::is_user($u->get('idUtilisateur'))) || Session::is_admin()) {
            $id = $_GET['idUtilisateur'];
            $pagetitle = 'Suppression d\'utilisateur';
            $view = 'deleted';
            ModelUtilisateurs::delete($id);
            $tab_u = ModelUtilisateurs::selectAll();
            require_once File::build_path(array('view', 'view.php'));
        } else {
            ControllerUtilisateurs::connect();
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
        if (($_POST['mdpUtilisateur'] != $_POST['mdpUtilisateurC']) || !filter_var($_POST['mailUtilisateur'], FILTER_VALIDATE_EMAIL)) {
            echo 'Erreur les deux mots de passe ne correspondent pas';
            $pagetitle = 'Créer votre utilisateur';
            $view = 'update';
            require_once File::build_path(array('view', 'view.php'));
        } else {
            if (!ModelUtilisateurs::checkEmail($_POST['mailUtilisateur'])) {
                $_POST['mdpUtilisateur'] = Security::chiffrer($_POST['mdpUtilisateur']);
                if(!isset($_POST['idRole'])) {
                    $_POST['idRole'] = 1;
                }
                $utilisateur = new ModelUtilisateurs($_POST);
                $utilisateur->save();
                $pagetitle = 'Liste des utilisateurs';
                $tab = ModelUtilisateurs::selectAll();
                $view = 'created';
                require_once File::build_path(array('view', 'view.php'));
            } else {
                echo 'Cet email est déjà utilisé';
            }
        }
    }

    public static function update()
    {
        $u = ModelUtilisateurs::select($_GET['idUtilisateur']);
        if ((isset($u) && Session::is_user($u->get('idUtilisateur'))) || Session::is_admin()) {
            $pagetitle = 'Modification d\'un utilisateur';
            $view = 'update';
            require_once File::build_path(array('view', 'view.php'));
        } else {
            ControllerUtilisateurs::connect();
        }
    }

    public static function updated()
    {
        $u = ModelUtilisateurs::select($_GET['idUtilisateur']);
        if ((isset($u) && Session::is_user($u->get('idUtilisateur'))) || Session::is_admin()) {
            if ($_POST['mdpUtilisateur'] != $_POST['mdpUtilisateurC']) {
                echo 'Erreur les deux mots de passe ne correspondent pas';
                $pagetitle = 'Modification d\'un utilisateur';
                $view = 'update';
                $_GET['login'] = $_POST['login'];
                require_once File::build_path(array('view', 'view.php'));
            } else {
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
                    // 'bloque' => $_POST['bloque'],
                    'idRole' => $_POST['idRole'],
                );
                $_SESSION['idRole'] = $_POST['idRole'];
                ModelUtilisateurs::update($data);
                require_once File::build_path(array('view', 'view.php'));
            }
        } else {
            ControllerUtilisateurs::connect();
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
        $mot_de_passe_chiffre = Security::chiffrer($_POST['mdpUtilisateur']);
        $test = ModelUtilisateurs::checkPassword($_POST['idUtilisateur'], $mot_de_passe_chiffre);
        if ($test) {
            $view = 'detail';
            $u = ModelUtilisateurs::select($_POST['idUtilisateur']);
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
