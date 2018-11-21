<?php
require_once File::build_path(array('model', 'ModelCategories.php'));

class ControllerCategories{
  protected static $object = 'categories';

  public static function read(){
    $id = $_GET("primary_value");
    if(ModelCategories::select($id) != false){
      require File::build_path(array("view", "categories", "details.php"));
    }else{
      require File::build_path(array("view", "categories", "error.php"));
    }
  }

  public static function readAll(){
    $user_tab = ModelCategories::selectAll();
  }

  public static function create(){
    require File::build_path(array("view", "categories", "create.php"));
  }

  public static function created(){
    $categorie = new ModelCategories($_POST);
    $categorie->save();
    ControllerCategories::readAll();
  }
}

?>
