<?php
require_once File::build_path(array('model', 'ModelUtilisateurs.php'));

class ControllerUtilisateurs
{
  protected static $object = 'utilisateurs';

  public static function read()
  {
    $pagetitle = 'Détail de l\'utilisateur';
    $u = ModelUtilisateurs::select($_GET['idUtilisateur']);
    if($u != false){
      $view = 'detail';
      require File::build_path(array("view", "view.php"));
    }else{
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
}

?>
