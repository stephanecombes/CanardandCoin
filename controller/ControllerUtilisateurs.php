<?php
require_once File::build_path(array('model', 'ModelUtilisateurs.php'));

class ControllerUtilisateurs
{
    protected static $object = 'utilisateurs';

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

    public static function readAll()
    {
        $pagetitle = 'Liste des utilisateurs';
        $tab = ModelUtilisateurs::selectAll();
        $view = 'list';
        require_once File::build_path(array('view', 'view.php'));
    }

    public static function create()
    {
        $pagetitle = 'Création d\'un utilisateur';
        $view = 'create';
        require File::build_path(array("view", "view.php"));
    }

    public static function created()
    {
        $pagetitle = 'Utilisateur créé';
        $view = 'created';
        $utilisateur = new ModelUtilisateurs($_POST);
        $utilisateur->save();
        ControllerUtilisateurs::readAll();
    }

    public static function connect()
    {
      $pagetitle = 'Connexion';
      $view = 'connect';
      require File::build_path(array("view", "view.php"));
    }

    public static function connected()
    {
      $idUser = $_POST['idUtilisateur'];
      $user = ModelUtilisateurs::select($idUser);
      if(!$user){
        $pagetitle = 'connexion ratée';
        $view = 'failConnect';
        require File::build_path(array("view", "view.php"));
      }else{
        $pagetitle = 'Connexion réussie';
        $view = 'connected';
        require File::build_path(array("view", "view.php"));
      }
    }

    public static function disconnect()
    {
      $pagetitle = 'Déconnexion';
      $view = 'disconnect';
      require File::build_path(array("view", "view.php"));
    }

    public static function disconnected()
    {
      $pagetitle = 'Déconnecté';
      $view = 'disconnected';
      require File::build_path(array("view", "view.php"));
    }
}
