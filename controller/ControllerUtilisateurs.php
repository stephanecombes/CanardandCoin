<?php
require_once File::build_path(array('model', 'ModelUtilisateurs.php'));

class ControllerUtilisateurs{
  protected static $object = 'utilisateurs';

  public static function read(){
    $id = $_GET("primary_value");
    if(ModelUtilisateurs::select($id) != false){
      require File::build_path(array("view", "utilisateurs", "details.php"));
    }else{
      require File::build_path(array("view", "utilisateurs", "error.php"));
    }
  }

  public static function readAll(){
    $user_tab = ModelUtilisateurs::selectAll();
  }

  public static function create(){
    require File::build_path(array("view", "utilisateurs", "create.php"));
  }

  public static function created(){
    var_dump($_POST);
    $utilisateur = new ModelUtilisateurs($_POST['nomUtilisateur'], $_POST['prenomUtilisateur'], $_POST['mailUtilisateur'], $_POST['ageUtilisateur'], $_POST['mdpUtilisateur'], $_POST['idRole']);
    $utilisateur->save();
    ControllerUtilisateurs::readAll();
  }
}

?>
