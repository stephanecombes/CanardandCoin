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
        if (isset($u) && Session::is_user($u->get('idUtilisateur'))) {
            $id = $_GET['idUtilisateur'];
            $pagetitle = 'Suppression d\'utilisateur';
            $view = 'deleted';
            ModelUtilisateurs::delete($id);
            $tab_u = ModelUtilisateurs::selectAll();
            require_once File::build_path(array('view', 'view.php'));
        } else {
            ControllerUtilisateur::connect();
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
        if ($_POST['mdpUtilisateur'] != $_POST['mdpUtilisateurC']) {
            echo 'Erreur les deux mots de passe ne correspondent pas';
            $pagetitle = 'Créer votre utilisateur';
            $view = 'update';
            require_once File::build_path(array('view', 'view.php'));
        } else {
            $_POST['mdpUtilisateur'] = Security::chiffrer($_POST['mdpUtilisateur']);
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
        if (isset($u) && Session::is_user($u->get('idUtilisateur'))) {
            $pagetitle = 'Modification d\'un utilisateur';
            $view = 'update';
            require_once File::build_path(array('view', 'view.php'));
        } else {
            ControllerUtilisateurs::connect();
        }
    }

    public static function updated()
    {
        if (isset($u) && Session::is_user($u->get('idUtilisateur'))) {
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
                    'bloque' => $_POST['bloque'],
                    'idRole' => $_POST['idRole'],
                );
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
        $test = ModelUtilisateurs::select($_POST['idUtilisateur']);
        if (!$test) {
            $pagetitle = 'connexion ratée';
            $view = 'failConnect';
            require File::build_path(array("view", "view.php"));
        } else {
            $pagetitle = 'Connexion réussie';
            $view = 'connected';
            $_SESSION['idUtilisateur'] = $test->get('idUtilisateur');
            require File::build_path(array("view", "view.php"));
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
